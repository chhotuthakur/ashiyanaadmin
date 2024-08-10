<?php

namespace App\Filament\Resources;

use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
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

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('full_name')
                ->required()
                ->maxLength(255),
            TextInput::make('contact_number')
                ->maxLength(20),
            TextInput::make('address')
                ->maxLength(255),
            TextInput::make('email')
                ->required()
                ->email()
                ->maxLength(255),
            TextInput::make('password')
                ->password()
                ->required(fn ($livewire) => $livewire instanceof Pages\CreateUser)
                ->minLength(8)
                ->maxLength(255)
                ->dehydrateStateUsing(fn ($state) => bcrypt($state)),
            Select::make('role')
                ->options([
                    'User' => 'User',
                    'Admin' => 'Admin',
                    'Agent' => 'Agent',
                ])
                ->required()
                ->disabled(fn ($livewire) => Auth::user()->role !== 'Admin'), // Use Auth facade instead of auth()
            Select::make('subscription')
                ->options([
                    'Yes' => 'Yes',
                    'No' => 'No',
                ])
                ->default('No'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('full_name')
                ->sortable()
                ->searchable(),
            TextColumn::make('contact_number'),
            TextColumn::make('address'),
            TextColumn::make('email')
                ->sortable()
                ->searchable(),
            BadgeColumn::make('role')
                ->colors([
                    'success' => 'Agent',
                    'warning' => 'Admin',
                    'primary' => 'User',
                ]),
            BadgeColumn::make('subscription')
                ->colors([
                    'success' => 'Yes',
                    'danger' => 'No',
                ]),
        ])
        ->filters([
            // Add any custom filters if needed
        ])
        ->actions([
            // Define table actions here
        ])
        ->bulkActions([
            // Define bulk actions here
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
