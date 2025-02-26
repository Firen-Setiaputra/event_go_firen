<?php

namespace App\Filament\Resources\TiketResource\Pages;

use App\Filament\Resources\TiketResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTiket extends EditRecord
{
    protected static string $resource = TiketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
