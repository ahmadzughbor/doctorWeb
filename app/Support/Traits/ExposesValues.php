<?php

namespace App\Support\Traits;

use Illuminate\Support\Collection;

/**
 * @mixin \BackedEnum
 */
trait ExposesValues
{
    /**
     * @return array<string>
     */
    public static function values(): array
    {
        return array_values(array_map(fn (self $case) => $case->value, self::cases()));
    }

    /**
     * @return Collection<static>
     */
    public static function collect(): Collection
    {
        return collect(static::cases());
    }

    /**
     * @return Collection<static>
     */
    public static function except(self $value): Collection
    {
        return self::collect()->filter(fn (self $v) => $v !== $value);
    }
}
