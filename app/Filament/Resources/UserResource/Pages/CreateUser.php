<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Enums\Role;
use App\Filament\Resources\UserResource;
use App\Filament\Support\Traits\NotifiesAboutValidationErrors;
use App\Models\Doctor;
use App\Models\Patient;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
    use NotifiesAboutValidationErrors;

    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $role = $data['role'];
        $userData = array_diff_key($data, ['medical_history' => '', 'speciality' => '', 'qualification' => '']);
        $userRecord = parent::getModel()::create($userData);

        if ($role === Role::PATIENT->value) {
            $patientData = [
                'medical_history' => $data['medical_history'],
                'user_id' => $userRecord->id,
            ];
            Patient::create($patientData);
        }

        if ($role === Role::DOCTOR->value) {
            $doctorData = [
                'speciality' => $data['speciality'],
                'qualification' => $data['qualification'],
                'user_id' => $userRecord->id,
            ];
            Doctor::create($doctorData);
        }

        return $userRecord;
    }
}
