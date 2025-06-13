<?php

namespace Branzia\Hookable;

class HookManager
{
    protected array $hooks = [];

    public function register(string $hookName, callable $callback): void
    {
        $this->hooks[$hookName][] = $callback;
    }

    public function fire(string $hookName, ...$args): void
    {
        foreach ($this->hooks[$hookName] ?? [] as $callback) {
            $callback(...$args);
        }
    }

    public function filter(string $hookName, $value, ...$args)
    {
        foreach ($this->hooks[$hookName] ?? [] as $callback) {
            $value = $callback($value, ...$args);
        }

        return $value;
    }

    public function views(string $hookName): array
    {
        return array_map(
            fn ($callback) => $callback(),
            $this->hooks[$hookName] ?? []
        );
    }
}
