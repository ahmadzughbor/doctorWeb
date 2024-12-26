<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('doctor_id')->constrained();
            $table->foreignId('patient_id')->constrained();

            $table->timestamp('starts_at')->nullable();
            $table->timestamp('finishes_at')->nullable();
            $table->string('status')->nullable();
            $table->text('feedback')->nullable();
            $table->integer('rating')->nullable();

            $table->timestamps();
        });
    }
};
