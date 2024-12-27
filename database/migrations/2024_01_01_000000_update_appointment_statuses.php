<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\AppointmentStatus;
use App\Models\Appointment;

return new class extends Migration
{
    public function up(): void
    {
        // Update existing appointments to use valid statuses
        Appointment::where('status', 'pending')->update(['status' => AppointmentStatus::SCHEDULED->value]);
        Appointment::where('status', 'finished')->update(['status' => AppointmentStatus::COMPLETED->value]);
        Appointment::where('status', 'canceled')->update(['status' => AppointmentStatus::CANCELLED->value]);
    }

    public function down(): void
    {
        // No need for down migration as we're just fixing data
    }
}; 