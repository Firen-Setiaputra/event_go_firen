<?php

namespace App\Filament\Resources\TiketResource\Pages;

use App\Filament\Resources\TiketResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTiket extends CreateRecord
{
    protected static string $resource = TiketResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
