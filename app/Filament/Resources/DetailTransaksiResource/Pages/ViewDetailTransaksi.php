<?php

namespace App\Filament\Resources\DetailTransaksiResource\Pages;

use App\Filament\Resources\DetailTransaksiResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDetailTransaksi extends ViewRecord
{
    protected static string $resource = DetailTransaksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
