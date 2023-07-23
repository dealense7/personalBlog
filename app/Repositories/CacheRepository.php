<?php

declare(strict_types=1);

namespace App\Repositories;

use Closure;
use Illuminate\Cache\TaggedCache;
use Illuminate\Contracts\Cache\Repository as CacheContract;
use Illuminate\Database\Eloquent\Collection;
use JetBrains\PhpStorm\Pure;

use function is_null;
use function is_scalar;
use function str_starts_with;
use function strtolower;
use function vsprintf;

abstract class CacheRepository
{
    protected const DELIMITER_KEY = '#';
    protected const DELIMITER_SCOPE = ':';

    protected string $namespace = '';
    protected int $cacheTtl = 1800; // 30 minutes
    protected array $cacheTags = [];
    protected null|CacheContract|TaggedCache $cache = null;
    protected static ?int $globalTtl = null;

    public function remember(string $key, Closure $closure, ?int $minutes = null): mixed
    {
        $cache = $this->getCache($this->getTags());

        $value = $cache->get($key);

        if (!is_null($value)) {
            return $value;
        }

        $cache->put($key, $value = $closure(), $minutes * 60 ?? $this->getTtl());

        return $value;
    }

    public function flush(): void
    {
        $this->getCache($this->getTags())->flush();
    }

    public function forget(?string $key = null): void
    {
        $this->getCache($this->getTags())->forget($key);
    }

    public function getTtl(): int
    {
        if (!is_null(self::$globalTtl)) {
            return self::$globalTtl;
        }

        return $this->cacheTtl;
    }

    public function setTtl(int $minutes): CacheRepository
    {
        $this->cacheTtl = $minutes;

        return $this;
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public static function setGlobalTtl(int $ttl): void
    {
        self::$globalTtl = $ttl;
    }

    public static function resetGlobalTtl(): void
    {
        self::$globalTtl = null;
    }

    protected function getKey(string $key, ...$params): string
    {
        $delimiter = str_starts_with($key, '%') ? self::DELIMITER_KEY : self::DELIMITER_SCOPE;

        return $this->generateKey($key, $delimiter, $params);
    }

    #[Pure]
    protected function generateKey(string $key, $delimiter = self::DELIMITER_SCOPE, array $params = []): string
    {
        $fullKey = $this->getNamespace() . $delimiter . $key;

        if (!empty($params)) {
            $fullKey = vsprintf($fullKey, $params);
        }

        return $fullKey;
    }

    protected function getTags(): array
    {
        return $this->cacheTags;
    }

    protected function setTags(array $tags): CacheRepository
    {
        $this->cacheTags = $tags;

        return $this;
    }

    protected function setTag(?string $tag = null): CacheRepository
    {
        $tag = $this->getNamespace() . '_' . $tag;

        $this->setTags([$tag]);

        return $this;
    }

    protected function setCache(CacheContract $cache): CacheRepository
    {
        $this->cache = $cache;

        return $this;
    }

    protected function getCache(array $tags = []): CacheContract|TaggedCache
    {
        if (!empty($tags)) {
            return $this->cache->tags($tags);
        }

        return $this->cache;
    }

    protected function createKeyFromArgs(array $args, ?string $prefix = null, ?string $postfix = null): string
    {
        $key = $this->getNamespace();

        if (!empty($prefix)) {
            $key .= self::DELIMITER_SCOPE . strtolower($prefix);
        }

        foreach ($args as $argKey => $argValue) {
            $argValue = $this->parseArgValue($argValue);

            $key .= self::DELIMITER_SCOPE . $argKey . self::DELIMITER_KEY . $argValue;
        }

        if (!is_null($postfix)) {
            $key .= self::DELIMITER_SCOPE . $postfix;
        }

        return $key;
    }

    private function parseArgValue(mixed $argValue): string
    {
        if (is_null($argValue)) {
            $argValue = 'null';
        }

        if ($argValue instanceof Collection) {
            $argValue = $argValue->getDictionaryCollection();
            $argValue = $argValue->keys();
        }

        if (!is_scalar($argValue)) {
            $argValue = self::hash($argValue);
        }

        return (string)$argValue;
    }

    public static function hash($data): string
    {
        if (is_array($data)) {
            sort($data);
            $data = serialize($data);
        }

        if (is_object($data)) {
            $data = serialize($data);
        }

        if (is_null($data)) {
            $data = 'NULL';
        }

        return sha1((string)$data);
    }
}
