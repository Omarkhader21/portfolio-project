<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutMeAndSkillResource\Pages;
use App\Filament\Resources\AboutMeAndSkillResource\RelationManagers;
use App\Models\AboutMeAndSkill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutMeAndSkillResource extends Resource
{
    protected static ?string $model = AboutMeAndSkill::class;

    protected static ?string $navigationIcon = 'fas-star';

    protected static ?string $navigationGroup = 'Home Page Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('icon')
                    ->options([
                        'fas fa-code' => 'Code',
                        'fas fa-paint-brush' => 'Paint Brush',
                        'fas fa-laptop' => 'Laptop',
                        'fas fa-database' => 'Database',
                        'fas fa-chart-line' => 'Chart Line',
                        // Add more Font Awesome class names here
                    ])
                    ->searchable() // Adds a search box for better usability
                    ->required(), // Mark it as required
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('icon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListAboutMeAndSkills::route('/'),
            'create' => Pages\CreateAboutMeAndSkill::route('/create'),
            'edit' => Pages\EditAboutMeAndSkill::route('/{record}/edit'),
        ];
    }
}
