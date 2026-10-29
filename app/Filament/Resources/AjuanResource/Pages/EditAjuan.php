<?php

namespace App\Filament\Resources\AjuanResource\Pages;

use App\Filament\Resources\AjuanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAjuan extends EditRecord
{
    protected static string $resource = AjuanResource::class;

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
