<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\AppointmentStatus;

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
        $is_past = $starts_at < now();

        // If appointment is in the past, it's either completed or cancelled
        // If it's in the future, it's scheduled
        $status = $is_past 
            ? fake()->randomElement([AppointmentStatus::COMPLETED->value, AppointmentStatus::CANCELLED->value])
            : AppointmentStatus::SCHEDULED->value;

        return [
            'doctor_id' => $doctor->id,
            'patient_id' => $patient->id,
            'starts_at' => $starts_at,
            'status' => $status,
            'feedback' => $status === AppointmentStatus::COMPLETED->value ? fake()->text(200) : null,
            'rating' => $status === AppointmentStatus::COMPLETED->value ? fake()->numberBetween(2, 5) : null,
        ];
    }
}
