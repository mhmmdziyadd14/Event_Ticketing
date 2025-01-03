<?php
namespace App\Filament\Resources;

use App\Filament\Resources\ArtistEventResource\Pages;
use App\Models\Artist_Event;
use App\Models\Event; // Import Event model
use App\Models\Artist; // Import Artist model
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ArtistEventResource extends Resource
{
    protected static ?string $model = Artist_Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // Set the label for the navigation
    protected static ?string $navigationLabel = 'Event Artist'; // Change this to your desired label

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('event_id')
                    ->relationship('event', 'nama') // Assuming 'event' is the relationship method in Artist_Event model
                    ->required()
                    ->label('Event'),
                
                Forms\Components\Select::make('artist_id')
                    ->relationship('artist', 'nama') // Assuming 'artist' is the relationship method in Artist_Event model
                    ->required()
                    ->label('Artist'),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('event.nama')->label('Event'), // Displaying event name
                Tables\Columns\BadgeColumn::make('artist.nama')->label('Artist'), // Displaying artist name
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Define any relation managers if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArtistEvents::route('/'),
            'create' => Pages\CreateArtistEvent::route('/create'),
            'edit' => Pages\EditArtistEvent::route('/{record}/edit'),
        ];
    }
}