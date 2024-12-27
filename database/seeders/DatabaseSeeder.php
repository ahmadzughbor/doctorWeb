<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\Role;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => Role::ADMIN->value,
            'gender' => 'male',
        ]);

        // Create doctors
        $doctors = [
            [
                'name' => 'Dr. John Smith',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'role' => Role::DOCTOR->value,
                'gender' => 'male',
                'speciality' => 'Cardiology',
                'qualification' => 'MD, Cardiology',
            ],
            [
                'name' => 'Dr. Sarah Johnson',
                'email' => 'sarah@example.com',
                'password' => Hash::make('password'),
                'role' => Role::DOCTOR->value,
                'gender' => 'female',
                'speciality' => 'Pediatrics',
                'qualification' => 'MD, Pediatrics',
            ]
        ];

        foreach ($doctors as $doctor) {
            $user = User::create([
                'name' => $doctor['name'],
                'email' => $doctor['email'],
                'password' => $doctor['password'],
                'role' => $doctor['role'],
                'gender' => $doctor['gender'],
            ]);

            Doctor::create([
                'user_id' => $user->id,
                'speciality' => $doctor['speciality'],
                'qualification' => $doctor['qualification'],
            ]);
        }

        // Create patients
        $patients = [
            [
                'name' => 'Alice Cooper',
                'email' => 'alice@example.com',
                'password' => Hash::make('password'),
                'role' => Role::PATIENT->value,
                'gender' => 'female',
                'medical_history' => 'No major health issues',
            ],
            [
                'name' => 'Bob Wilson',
                'email' => 'bob@example.com',
                'password' => Hash::make('password'),
                'role' => Role::PATIENT->value,
                'gender' => 'male',
                'medical_history' => 'Mild asthma',
            ]
        ];

        foreach ($patients as $patient) {
            $user = User::create([
                'name' => $patient['name'],
                'email' => $patient['email'],
                'password' => $patient['password'],
                'role' => $patient['role'],
                'gender' => $patient['gender'],
            ]);

            Patient::create([
                'user_id' => $user->id,
                'medical_history' => $patient['medical_history'],
            ]);
        }
    }
}
