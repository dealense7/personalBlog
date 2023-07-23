<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\Repositories\RepositoryManagerContract;
use Closure;
use Illuminate\Database\Connection;

class RepositoryManager implements RepositoryManagerContract
{
    private Connection $database;

    public function __construct(Connection $database)
    {
        $this->database = $database;
    }

    public function transaction(Closure $callback, int $attempts = 1)
    {
        return $this->database->transaction($callback, $attempts);
    }
}

