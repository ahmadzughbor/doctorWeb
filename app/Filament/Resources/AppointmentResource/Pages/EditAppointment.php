<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use App\Filament\Support\Traits\NotifiesAboutValidationErrors;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppointment extends EditRecord
{
    use NotifiesAboutValidationErrors;

    protected static string $resource = AppointmentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
