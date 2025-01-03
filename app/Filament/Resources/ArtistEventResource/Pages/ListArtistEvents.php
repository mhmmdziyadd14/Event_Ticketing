<?php

namespace App\Filament\Resources\ArtistEventResource\Pages;

use App\Filament\Resources\ArtistEventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArtistEvents extends ListRecords
{
    protected static string $resource = ArtistEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
