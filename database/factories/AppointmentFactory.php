<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    public function definition(): array
    {
        $doctor = Doctor::inRandomOrder()->first();
        $patient = Patient::inRandomOrder()->first();

        $starts_at = fake()->dateTimeBetween('-5 days', '+20 days');

        $is_finished = $starts_at > now();

        $status = $is_finished ? 'finished' : fake()->randomElement(['canceled', 'pending']);

        return [
            'doctor_id' => $doctor->id,
            'patient_id' => $patient->id,
            'starts_at' => $starts_at,
            'finishes_at' => $is_finished ? fake()->dateTimeBetween('-5 days', 'now') : null,
            'status' => $status,
            'feedback' => $status === 'pending' ? null : fake()->text(200),
            'rating' => $is_finished ? fake()->numberBetween(2, 5) : null,
        ];
    }
}
