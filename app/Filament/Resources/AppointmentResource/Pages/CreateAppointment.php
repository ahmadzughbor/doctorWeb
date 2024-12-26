<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use App\Filament\Support\Traits\NotifiesAboutValidationErrors;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAppointment extends CreateRecord
{
    use NotifiesAboutValidationErrors;

    protected static string $resource = AppointmentResource::class;
}
