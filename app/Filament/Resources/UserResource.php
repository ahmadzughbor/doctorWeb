<?php

namespace App\Filament\Resources;

use App\Enums\Gender;
use App\Enums\Role;
use App\Filament\Resources\UserResource\Pages;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General Information')
                    ->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('email')->email()->required(),
                        DateTimePicker::make('email_verified_at'),
                        Select::make('gender')
                            ->label('Gender')
                            ->options(Gender::options(fn (Gender $gender) => $gender->toHumanReadableString()))
                            ->required(),
                        Select::make('role')
                            ->label('Role')
                            ->reactive(fn ($context) => $context === 'create')
                            // Doesn't make sense to convert doctor to patient.
                            ->disabled(fn ($context) => $context !== 'create')
                            ->options(Role::options(fn (Role $role) => $role->toHumanReadableString()))

                            ->required(),
                        TextInput::make('password')
                            ->password()
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                    ])
                    ->columns(['xl' => 2]),

                Section::make('More Information')
                    ->schema([
                        // Patient
                        RichEditor::make('medical_history')
                            ->label('Medical history')
                            ->disableAllToolbarButtons()
                            ->enableToolbarButtons([
                                'bold',
                                'link',
                                'italic',
                                'strike',
                            ])
                            ->formatStateUsing(fn (?User $record) => $record ? Patient::whereBelongsTo($record)->first()?->medical_history : '')
                            ->visible(fn (callable $get) => $get('role') === Role::PATIENT->value),
                        // use reactive state here

                        // Doctor
                        RichEditor::make('qualification')
                            ->label('Qualification')
                            ->formatStateUsing(fn (?User $record) => $record ? Doctor::where('user_id', $record?->id)->first()?->qualification : '')
                            ->disableAllToolbarButtons()
                            ->enableToolbarButtons([
                                'bold',
                                'link',
                                'italic',
                                'strike',
                            ])
                            ->visible(fn (callable $get) => $get('role') === Role::DOCTOR->value),
                        Select::make('speciality')
                            ->label('Speciality')
                            ->formatStateUsing(fn (?User $record) => $record ? Doctor::where('user_id', $record?->id)->first()?->speciality : '')
                            ->options(static::getDoctorSpecialityOptions())
                            ->visible(fn (callable $get) => $get('role') === Role::DOCTOR->value),
                    ])
                    ->columns(['xl' => 2])
                    ->hidden(fn (callable $get, $context) => $get('role') === Role::ADMIN->value),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                BadgeColumn::make('role')
                    ->color(fn (User $record) => $record->role->toFilamentBadgeColor())
                    ->enum(Role::options(fn (Role $role) => $role->toHumanReadableString())),
                TextColumn::make('gender')
                    ->sortable()
                    ->enum(Gender::options(fn (Gender $gender) => $gender->toHumanReadableString())),
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
                SelectFilter::make('role')
                    ->options(Role::options(fn (Role $role) => $role->toHumanReadableString())),
                SelectFilter::make('speciality')
                    ->options(static::getDoctorSpecialityOptions()),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->sorted();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getDoctorSpecialityOptions(): array
    {
        return [
            'cardiologist' => 'Cardiologist',
            'dermatologist' => 'Dermatologist',
            'orthopedic Surgeon' => 'Orthopedic Surgeon',
            'neurologist' => 'Neurologist',
            'gynecologist' => 'Gynecologist',
            'psychiatrist' => 'Psychiatrist',
            'pediatrician' => 'Pediatrician',
            'oncologist' => 'Oncologist',
            'ophthalmologist' => 'Ophthalmologist',
            'anesthesiologist' => 'Anesthesiologist',
        ];
    }
}
