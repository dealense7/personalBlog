<?php

declare(strict_types=1);

namespace App\Contracts\Repositories;

use Closure;

interface RepositoryManagerContract
{
    public function transaction(Closure $callback, int $attempts = 1);
}

