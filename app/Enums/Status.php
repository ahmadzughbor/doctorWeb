<?php

namespace App\Enums;

use App\Support\Traits\AsOptions;
use App\Support\Traits\ExposesValues;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
enum Status: string
{
    use AsOptions;
    use ExposesValues;

    case PENDING = 'pending';
    case CANCELED = 'canceled';
    case FINISHED = 'finished';

    public function toHumanReadableString(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::CANCELED => 'Canceled',
            self::FINISHED => 'Finished',
        };
    }

    public function toFilamentBadgeColor(): string
    {
        return match ($this) {
            self::PENDING => 'primary',
            self::CANCELED => 'secondary',
            self::FINISHED => 'success',
        };
    }
}
