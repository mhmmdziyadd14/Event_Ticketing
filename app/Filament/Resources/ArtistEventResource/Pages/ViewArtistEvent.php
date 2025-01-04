<?php

namespace App\Filament\Resources\ArtistEventResource\Pages;

use App\Filament\Resources\ArtistEventResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewArtistEvent extends ViewRecord
{
    protected static string $resource = ArtistEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}