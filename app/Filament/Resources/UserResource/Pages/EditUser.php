<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Enums\Role;
use App\Filament\Resources\UserResource;
use App\Filament\Support\Traits\NotifiesAboutValidationErrors;
use App\Models\Doctor;
use App\Models\Patient;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditUser extends EditRecord
{
    use NotifiesAboutValidationErrors;

    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $role = $record->role;
        
        // Update user data
        $userData = array_diff_key($data, [
            'medical_history' => '', 
            'allergies' => '',
            'current_medications' => '',
            'speciality' => '', 
            'qualification' => ''
        ]);
        $record->update($userData);

        // Update patient data
        if ($role === Role::PATIENT) {
            $patient = Patient::firstOrCreate(['user_id' => $record->id]);
            $patient->update([
                'medical_history' => $data['medical_history'] ?? null,
                'allergies' => $data['allergies'] ?? null,
                'current_medications' => $data['current_medications'] ?? null,
            ]);
        }

        // Update doctor data
        if ($role === Role::DOCTOR) {
            $doctor = Doctor::firstOrCreate(['user_id' => $record->id]);
            $doctor->update([
                'speciality' => $data['speciality'] ?? null,
                'qualification' => $data['qualification'] ?? null,
            ]);
        }

        return $record;
    }
}
