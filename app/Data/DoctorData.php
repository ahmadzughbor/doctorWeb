<?php

namespace App\Data;

use App\Models\Doctor;
use Spatie\LaravelData\Data;

class DoctorData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $gender,
        public readonly ?string $qualification,
        public readonly ?string $speciality,
    ) {
    }

    public static function fromModel(Doctor $doctor): static
    {
        return self::withoutMagicalCreationFrom([
            'name' => $doctor->user->name,
            'email' => $doctor->user->email,
            'gender' => $doctor->user->gender,
            'qualification' => $doctor->qualification,
            'speciality' => $doctor->speciality,
        ]);
    }
}
