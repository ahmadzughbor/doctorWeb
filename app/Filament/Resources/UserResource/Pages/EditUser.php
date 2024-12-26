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
        $userData = array_diff_key($data, ['medical_history' => '', 'speciality' => '', 'qualification' => '']);
        $record->update($userData);

        if ($role === Role::PATIENT) {
            dd('PATIENT');
            Patient::where('user_id', $record->id)->update([
                'medical_history' => $data['medical_history'],
            ]);
        }

        if ($role === Role::DOCTOR) {
            Doctor::where('user_id', $record->id)->update([
                'speciality' => $data['speciality'],
                'qualification' => $data['qualification'],
            ]);
        }

        return $record;
    }
}
