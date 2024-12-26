<?php

namespace App\Filament\Resources;

use App\Enums\Status;
use App\Filament\Resources\AppointmentResource\Pages;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General Information')
                    ->schema([
                        Select::make('doctor_id')
                            ->label('Doctor')
                            ->options(Doctor::all()->pluck('user.name', 'id'))
                            ->searchable()
                            ->required(),
                        Select::make('patient_id')
                            ->label('Patient')
                            ->options(Patient::all()->pluck('user.name', 'id'))
                            ->searchable()
                            ->required(),
                        DateTimePicker::make('starts_at')->required(),
                        DateTimePicker::make('finishes_at'),
                    ])
                    ->columns(['xl' => 2]),

                Section::make('Satisfaction')
                    ->schema([
                        Select::make('status')
                            ->label('Status')
                            ->options(Status::options(fn (Status $status) => $status->toHumanReadableString()))
                            ->required(),
                        TextInput::make('rating')->numeric()->minValue(1)->maxValue(5),
                        RichEditor::make('feedback')
                            ->label('Feedback')
                            ->disableAllToolbarButtons()
                            ->enableToolbarButtons([
                                'bold',
                                'link',
                                'italic',
                                'strike',
                            ])
                            ->columnSpan(['xl' => 2]),
                    ])
                    ->columns(['xl' => 2]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('doctor.user.name')
                    ->label('Doctor')
                    ->searchable()
                    ->url(fn (Appointment $record) => route('filament.resources.users.edit', $record->doctor->user->id)),
                TextColumn::make('patient.user.name')
                    ->label('Patient')
                    ->searchable()
                    ->url(fn (Appointment $record) => route('filament.resources.users.edit', $record->patient->user->id)),

                TextColumn::make('starts_at')
                    ->label('Starting date')
                    ->dateTime('M. j, Y \a\t H\hi')
                    ->sortable(),
                    TextColumn::make('finishes_at')
                    ->label('Finish date')
                    ->dateTime('M. j, Y \a\t H\hi')
                    ->sortable()
                    ->formatStateUsing(fn (Appointment $record) => $record->status === Status::CANCELED ? '-' : $record->finishes_at),

                BadgeColumn::make('status')
                    ->color(fn (Appointment $record) => $record->status->toFilamentBadgeColor())
                    ->enum(Status::options(fn (Status $status) => $status->toHumanReadableString())),

                TextColumn::make('rating')
                    ->formatStateUsing(fn (Appointment $record) => $record->status === Status::FINISHED ? $record->rating . "/5" : '-'),
                TextColumn::make('feedback')->limit(20),

                TextColumn::make('created_at')
                    ->label('Creation date')
                    ->dateTime('M. j, Y \a\t H\hi')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Last updated')
                    ->dateTime('M. j, Y \a\t H\hi')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(Status::options(fn (Status $status) => $status->toHumanReadableString())),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
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
