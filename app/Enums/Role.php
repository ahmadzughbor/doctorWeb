<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'admin';
    case DOCTOR = 'doctor';
    case PATIENT = 'patient';

    public static function options(): array
    {
        return [
            self::ADMIN->value => 'Admin',
            self::DOCTOR->value => 'Doctor',
            self::PATIENT->value => 'Patient',
        ];
    }

    public function toHumanReadableString(): string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::DOCTOR => 'Doctor',
            self::PATIENT => 'Patient',
        };
    }

    public static function fromString(string $value): self
    {
        return match ($value) {
            'admin' => self::ADMIN,
            'doctor' => self::DOCTOR,
            'patient' => self::PATIENT,
            default => throw new \ValueError("Invalid role: {$value}")
        };
    }
}
