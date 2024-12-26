<?php

namespace Database\Factories;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    public function definition(): array
    {
        $user = User::factory()->create([
            'role' => Role::PATIENT->value,
        ]);

        return [
            'user_id' => $user->id,
            'medical_history' => fake()->text(600),
        ];
    }
}
