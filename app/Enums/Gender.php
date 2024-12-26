<?php

namespace App\Enums;

use App\Support\Traits\AsOptions;
use App\Support\Traits\ExposesValues;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
enum Gender: string
{
    use AsOptions;
    use ExposesValues;

    case MALE = 'male';
    case FEMALE = 'female';

    public function toHumanReadableString(): string
    {
        return match ($this) {
            self::MALE => 'Male',
            self::FEMALE => 'Female',
        };
    }
}
