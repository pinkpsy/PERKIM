<?php

namespace App\Filament\Resources\AjuanResource\Pages;

use App\Filament\Resources\AjuanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAjuan extends CreateRecord
{
    protected static string $resource = AjuanResource::class;
    protected static bool $canCreateAnother = false;

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
