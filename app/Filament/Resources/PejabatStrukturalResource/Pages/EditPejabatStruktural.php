<?php

namespace App\Filament\Resources\PejabatStrukturalResource\Pages;

use App\Filament\Resources\PejabatStrukturalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPejabatStruktural extends EditRecord
{
    protected static string $resource = PejabatStrukturalResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
