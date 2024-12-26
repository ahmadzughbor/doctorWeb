<?php

namespace App\Data;

use App\Models\Patient;
use Spatie\LaravelData\Data;

class PatientData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $gender,
        public readonly ?string $medical_history,
    ) {
    }

    public static function fromModel(Patient $patient): static
    {
        return self::withoutMagicalCreationFrom([
            'name' => $patient->user->name,
            'email' => $patient->user->email,
            'gender' => $patient->user->gender,
            'medical_history' => $patient->medical_history,
        ]);
    }
}
