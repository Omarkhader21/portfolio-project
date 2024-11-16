<?php

namespace App\Filament\Resources\AboutMeAndSkillResource\Pages;

use App\Filament\Resources\AboutMeAndSkillResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutMeAndSkill extends EditRecord
{
    protected static string $resource = AboutMeAndSkillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
