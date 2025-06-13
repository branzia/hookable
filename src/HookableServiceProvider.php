<?php

namespace Branzia\Hookable;

use Illuminate\Support\ServiceProvider;

class HookableServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(HookManager::class, fn () => new HookManager());
    }
}
