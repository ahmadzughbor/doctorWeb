<?php

namespace App\Filament\Support\Traits;

use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;

trait NotifiesAboutValidationErrors
{
    public function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }
}
