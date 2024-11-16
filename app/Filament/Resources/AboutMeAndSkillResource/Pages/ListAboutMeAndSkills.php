<?php

namespace App\Filament\Resources\AboutMeAndSkillResource\Pages;

use App\Filament\Resources\AboutMeAndSkillResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutMeAndSkills extends ListRecords
{
    protected static string $resource = AboutMeAndSkillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
