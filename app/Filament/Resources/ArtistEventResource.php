<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArtistEventResource\Pages;
use App\Models\Artist_Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\SelectFilter;

class ArtistEventResource extends Resource
{
    protected static ?string $model = Artist_Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-musical-note';
    protected static ?string $navigationLabel = 'Artis di Event';
    protected static ?string $navigationGroup = 'Manajemen Event';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\Select::make('event_id')
                        ->relationship('event', 'nama')
                        ->required()
                        ->label('Pilih Event')
                        ->searchable()
                        ->preload(),
                    
                    Forms\Components\Select::make('artist_id')
                        ->relationship('artist', 'nama')
                        ->required()
                        ->label('Pilih Artis')
                        ->searchable()
                        ->preload(),
                    
                    // Forms\Components\TimePicker::make('waktu_tampil')
                    //     ->label('Waktu Tampil')
                    //     ->nullable(),
                    
                    // Forms\Components\TextInput::make('durasi_tampil')
                    //     ->numeric()
                    //     ->suffix('menit')
                    //     ->label('Durasi Tampil')
                    //     ->nullable()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event.nama')
                    ->label('Event')
                    ->badge()
                    ->color('primary')
                    ->searchable(),

                Tables\Columns\TextColumn::make('artist.nama')
                    ->label('Artis')
                    ->badge()
                    ->color('success')
                    ->searchable(),

                // Tables\Columns\TextColumn::make('waktu_tampil')
                //     ->label('Waktu Tampil')
                //     ->icon('heroicon-m-clock')
                //     ->toggleable(isToggledHiddenByDefault: true),

                // Tables\Columns\TextColumn::make('durasi_tampil')
                //     ->label('Durasi')
                //     ->suffix(' menit')
                //     ->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                SelectFilter::make('event')
                    ->relationship('event', 'nama')
                    ->label('Filter Event'),

                SelectFilter::make('artist')
                    ->relationship('artist', 'nama')
                    ->label('Filter Artis')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            // Tambahkan relasi jika diperlukan
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArtistEvents::route('/'),
            'create' => Pages\CreateArtistEvent::route('/create'),
            'edit' => Pages\EditArtistEvent::route('/{record}/edit'),
            'view' => Pages\ViewArtistEvent::route('/{record}'),
        ];
    }
}