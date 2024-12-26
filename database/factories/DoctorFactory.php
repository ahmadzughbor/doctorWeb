<?php

namespace Database\Factories;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    public function definition(): array
    {
        $user = User::factory()->create([
            'role' => Role::DOCTOR->value,
        ]);

        return [
            'user_id' => $user->id,
            'speciality' => fake()->randomElement($this->getDoctorSpecialityOptions()),
            'qualification' => fake()->text(600),
        ];
    }

    public function getDoctorSpecialityOptions(): array
    {
        return [
            'cardiologist',
            'dermatologist',
            'orthopedic Surgeon',
            'neurologist',
            'gynecologist',
            'psychiatrist',
            'pediatrician',
            'oncologist',
            'ophthalmologist',
            'anesthesiologist',
        ];
    }
}
