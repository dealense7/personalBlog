<?php

namespace App\Providers;

use App\Contracts\Repositories\PostRepositoryContract;
use App\Contracts\Repositories\TagRepositoryContract;
use App\Contracts\Services\FileServiceContract;
use App\Contracts\Services\PostServiceContract;
use App\Contracts\Services\TagServiceContract;
use App\Repositories\PostCacheRepository;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
use App\Services\FileService;
use App\Services\PostService;
use App\Services\TagService;
use Illuminate\Support\ServiceProvider;

class BindingsServiceProvider extends ServiceProvider
{
    private const REPOSITORIES = [
        PostRepositoryContract::class => [
            PostRepository::class,
            PostCacheRepository::class,
        ],
        TagRepositoryContract::class => [
            TagRepository::class,
        ],
    ];

    private const SERVICES = [
        PostServiceContract::class => [
            PostService::class,
        ],
        FileServiceContract::class => [
            FileService::class,
        ],
        TagServiceContract::class => [
            TagService::class,
        ],
    ];

    public function boot(): void
    {
        //
    }

    public function register(): void
    {
        $cacheServices = config('general.cache.cache_services');
        foreach (self::REPOSITORIES as $abstract => $repositories) {
            $concrete = $cacheServices ? ($repositories[1] ?? $repositories[0]) : $repositories[0];
            $this->app->bind($abstract, $concrete);
        }

        foreach (self::SERVICES as $abstract => $services) {
            $concrete = $cacheServices ? ($services[1] ?? $services[0]) : $services[0];
            $this->app->bind($abstract, $concrete);
        }
    }
}

