<?php

namespace App\Support\Traits;

use BackedEnum;
use Closure;

/** @mixin BackedEnum */
trait AsOptions
{
    /**
     * Returns an array of `value` -> `name` for this enum.
     */
    public static function options(?Closure $callback = null): array
    {
        return collect(static::cases())
            ->mapWithKeys(static fn (self $enum): array => [
                $enum->value => $callback ? $callback($enum) : $enum->name,
            ])->all();
    }
}
