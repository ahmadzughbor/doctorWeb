<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use App\Enums\Role;
use App\Enums\AppointmentStatus;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        Appointment::query()->delete();
        Doctor::query()->delete();
        Patient::query()->delete();
        User::query()->delete();

        // Create admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => Role::ADMIN,
        ]);

        // Create doctors
        User::factory(5)
            ->has(Doctor::factory())
            ->create([
                'role' => Role::DOCTOR,
            ]);

        // Create patients
        User::factory(10)
            ->has(Patient::factory())
            ->create([
                'role' => Role::PATIENT,
            ]);

        // Create appointments
        $doctors = Doctor::all();
        $patients = Patient::all();

        foreach ($patients as $patient) {
            $appointmentCount = rand(1, 3);
            for ($i = 0; $i < $appointmentCount; $i++) {
                $starts_at = fake()->dateTimeBetween('-5 days', '+20 days');
                $is_past = $starts_at < now();

                // If appointment is in the past, it's either completed or cancelled
                // If it's in the future, it's scheduled
                $status = $is_past 
                    ? fake()->randomElement([AppointmentStatus::COMPLETED->value, AppointmentStatus::CANCELLED->value])
                    : AppointmentStatus::SCHEDULED->value;

                Appointment::create([
                    'doctor_id' => $doctors->random()->id,
                    'patient_id' => $patient->id,
                    'starts_at' => $starts_at,
                    'status' => $status,
                    'feedback' => $status === AppointmentStatus::COMPLETED->value ? fake()->text(200) : null,
                    'rating' => $status === AppointmentStatus::COMPLETED->value ? fake()->numberBetween(2, 5) : null,
                ]);
            }
        }
    }
}
