<?php

namespace App\Actions;

use App\Data\CreateUserData;
use App\Enums\Role;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateUser
{
    use AsAction;

    public function handle(CreateUserData $data): User
    {
        $role = $data->role;
        $userData = array_diff_key($data->toArray(), ['medical_history' => '', 'speciality' => '', 'qualification' => '']);

        $user = User::create([
            ...$userData,
            'password' => Hash::make($data->password),
        ]);

        if ($role === Role::PATIENT->value) {
            $patientData = [
                'medical_history' => $data->medical_history,
                'user_id' => $user->id,
            ];
            Patient::create($patientData);
        }

        if ($role === Role::DOCTOR->value) {
            $doctorData = [
                'speciality' => $data->speciality,
                'qualification' => $data->qualification,
                'user_id' => $user->id,
            ];
            Doctor::create($doctorData);
        }

        return $user;
    }
}
