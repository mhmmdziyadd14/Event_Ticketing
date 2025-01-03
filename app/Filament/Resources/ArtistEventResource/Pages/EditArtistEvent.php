<?php

namespace App\Filament\Resources\ArtistEventResource\Pages;

use App\Filament\Resources\ArtistEventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArtistEvent extends EditRecord
{
    protected static string $resource = ArtistEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
