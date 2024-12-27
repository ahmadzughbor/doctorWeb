<?php

namespace App\Filament\Resources;

use App\Enums\AppointmentStatus;
use App\Filament\Resources\AppointmentResource\Pages;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('doctor_id')
                    ->label('Doctor')
                    ->required()
                    ->options(Doctor::with('user')->get()->pluck('user.name', 'id')),
                
                Forms\Components\Select::make('patient_id')
                    ->label('Patient')
                    ->required()
                    ->options(Patient::with('user')->get()->pluck('user.name', 'id')),
                
                Forms\Components\DateTimePicker::make('starts_at')
                    ->label('Appointment Date & Time')
                    ->required(),
                
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->required()
                    ->options(AppointmentStatus::options())
                    ->enum(AppointmentStatus::class),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('doctor.user.name')
                    ->label('Doctor')
                    ->sortable()
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('patient.user.name')
                    ->label('Patient')
                    ->sortable()
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('starts_at')
                    ->label('Date & Time')
                    ->dateTime()
                    ->sortable(),
                
                Tables\Columns\BadgeColumn::make('status')
                    ->enum(AppointmentStatus::options())
                    ->colors([
                        'warning' => 'scheduled',
                        'success' => 'completed',
                        'danger' => 'cancelled',
                    ]),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }    
}
