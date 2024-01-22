<?php

namespace App\Filament\Resources\CityResource\RelationManagers;

use App\Models\City;
use App\Models\Country;
use App\Models\Employee;
use App\Models\State;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeesRelationManager extends RelationManager
{
    protected static string $relationship = 'employees';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name'),
                TextInput::make('last_name')->required(),
                TextInput::make('address'),
                // Select::make('country_id')->relationship('country','name'),
                Select::make('country_id')->label('Country')->options(Country::all()->pluck('name', 'id'))->live(),
                // Select::make('state_id')->relationship('state','name'),id'))->live(),id'))->live(),id'))->live(),id'))->live(),id'))->live(),
                Select::make('state_id')->options(fn (Get $get): Collection => State::query()->where('country_id', $get('country_id'))->pluck('name', 'id'))->live(),

                // Select::make('city_id')->relationship('city','name'),
                Select::make('city_id')->options(fn (Get $get): Collection => City::query()->where('state_id', $get('state_id'))->pluck('name', 'id'))->live(),

                Select::make('department_id')->relationship('department', 'name'),
                TextInput::make('zip_code'),
                DatePicker::make('birthday'),
                DatePicker::make('date_hired'),
            ]);
    }

    public function table(Table $table): Table
    {
        // dd(Employee::with('country')->get());
        return $table
            ->recordTitleAttribute('first_name')
            ->columns([
                Tables\Columns\TextColumn::make('first_name')->searchable(),
                Tables\Columns\TextColumn::make('last_name')->searchable(),
                Tables\Columns\TextColumn::make('address')->searchable(),
                Tables\Columns\TextColumn::make('country.name')->searchable(),
                Tables\Columns\TextColumn::make('state.name')->searchable(),
                Tables\Columns\TextColumn::make('city.name')->searchable(),


            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
