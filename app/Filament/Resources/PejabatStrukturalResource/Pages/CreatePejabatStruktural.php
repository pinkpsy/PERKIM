<?php

namespace App\Filament\Resources\PejabatStrukturalResource\Pages;

use App\Filament\Resources\PejabatStrukturalResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePejabatStruktural extends CreateRecord
{
    protected static string $resource = PejabatStrukturalResource::class;
    protected static bool $canCreateAnother = false;

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
