<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class CreateUserData extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly string $role,
        public readonly string $gender,
        public readonly ?string $medical_history,
        public readonly ?string $qualification,
        public readonly ?string $speciality,
    ) {
    }
}
