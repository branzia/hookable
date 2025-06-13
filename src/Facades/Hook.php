<?php

namespace Branzia\Hookable\Facades;

use Illuminate\Support\Facades\Facade;

class Hook extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Branzia\Hookable\HookManager::class;
    }
}
