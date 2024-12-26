<?php

namespace App\Enums;

use App\Support\Traits\AsOptions;
use App\Support\Traits\ExposesValues;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
enum Role: string
{
    use AsOptions;
    use ExposesValues;

    case ADMIN = 'admin';
    case DOCTOR = 'doctor';
    case PATIENT = 'patient';

    public function toHumanReadableString(): string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::DOCTOR => 'Doctor',
            self::PATIENT => 'Patient',
        };
    }

    public function toFilamentBadgeColor(): string
    {
        return match ($this) {
            self::ADMIN => 'secondary',
            self::DOCTOR => 'success',
            self::PATIENT => 'primary',
        };
    }
}
