<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('city')->required(),
                TextInput::make('residential')->required(),
                // TextInput::make('property_type')->required(),
                Select::make('property_type')
                ->options([
                    'sell'=>'Sell',
                    'rented'=>'Rented',
                    'lease'=>'Lease',

                ])->required(),
                TextInput::make('apartment_type')->required(),
                TextInput::make('bhk_type')->required(),
                TextInput::make('ownership')->required(),
                TextInput::make('plot_area')->numeric()->required(),
                TextInput::make('built_up_area')->numeric()->required(),
                TextInput::make('facing')->nullable(),
                TextInput::make('total_floor')->numeric()->required(),
                TextInput::make('price')->numeric()->required(),
                TextInput::make('furniture_type')->required(),
                Select::make('parking')
                    ->options([
                        '1' => 'Yes',
                        '0' => 'No',
                    ])->required(),
                TextInput::make('bathroom')->numeric()->required(),
                TextInput::make('balcony')->numeric()->required(),
                TextInput::make('who_will_use')->required(),
                Select::make('gated_security')
                    ->options([
                        '1' => 'Yes',
                        '0' => 'No',
                    ])->required(),
                Select::make('water_supply')
                    ->options([
                        '1' => 'Yes',
                        '0' => 'No',
                    ])->required(),
                Select::make('power_backup')
                    ->options([
                        '1' => 'Yes',
                        '0' => 'No',
                    ])->required(),
                Select::make('amenities')
                    ->options([
                        'electricity' => 'Electricity',
                        'drainage' => 'Drainage',
                        'sewage' => 'Sewage',
                        'security' => 'Security',
                    ])
                    ->multiple()
                    ->required(),
                TextInput::make('locality')->required(),
                TextInput::make('landmark')->required(),
                TextInput::make('certified_approval')->required(),
                TextInput::make('taxes')->required(),
                TextInput::make('availability')->required(),
                TextInput::make('time_schedule')->required(),
                Repeater::make('photos')
                    ->schema([
                        FileUpload::make('photo')
                            ->directory('admin/properties/imgs')
                            ->image()
                            ->required(),
                    ])
                    ->columnSpan('full')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('city')->sortable()->searchable(),
                TextColumn::make('residential')->sortable()->searchable(),
                TextColumn::make('property_type')->sortable()->searchable(),
                TextColumn::make('apartment_type')->sortable()->searchable(),
                TextColumn::make('bhk_type')->sortable()->searchable(),
                TextColumn::make('ownership')->sortable()->searchable(),
                TextColumn::make('plot_area')->sortable()->searchable(),
                TextColumn::make('built_up_area')->sortable()->searchable(),
                TextColumn::make('facing')->sortable()->searchable(),
                TextColumn::make('total_floor')->sortable()->searchable(),
                TextColumn::make('price')->sortable()->searchable(),
                TextColumn::make('furniture_type')->sortable()->searchable(),
                BooleanColumn::make('parking'),
                TextColumn::make('bathroom')->sortable()->searchable(),
                TextColumn::make('balcony')->sortable()->searchable(),
                TextColumn::make('who_will_use')->sortable()->searchable(),
                BooleanColumn::make('gated_security'),
                BooleanColumn::make('water_supply'),
                BooleanColumn::make('power_backup'),
                BadgeColumn::make('amenities')->label('Amenities')->getStateUsing(fn($record) => implode(', ', $record->amenities)),
                TextColumn::make('locality')->sortable()->searchable(),
                TextColumn::make('landmark')->sortable()->searchable(),
                TextColumn::make('certified_approval')->sortable()->searchable(),
                TextColumn::make('taxes')->sortable()->searchable(),
                TextColumn::make('availability')->sortable()->searchable(),
                TextColumn::make('time_schedule')->sortable()->searchable(),
                TextColumn::make('photos')->label('Photos')->getStateUsing(function ($record) {
                    $photos = $record->photos;
                    if (is_string($photos)) {
                        $photos = json_decode($photos, true);
                    }
                    if (is_array($photos)) {
                        $photoUrls = array_map(fn($photo) => $photo['photo'], $photos);
                        return implode(', ', $photoUrls);
                    }
                    return $record->photos;
                }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
