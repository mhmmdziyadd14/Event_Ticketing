<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArtistResource\Pages;
use App\Models\Artist;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;

class ArtistResource extends Resource
{
    protected static ?string $model = Artist::class;

    protected static ?string $navigationIcon = 'heroicon-o-musical-note';
    protected static ?string $navigationLabel = 'Artis';
    protected static ?string $navigationGroup = 'Manajemen Event';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Artis')
                        ->required()
                        ->maxLength(255),

                    Textarea::make('deskripsi')
                        ->label('Deskripsi Artis')
                        ->rows(4)
                        ->maxLength(1000),

                    FileUpload::make('foto')
                        ->label('Foto Profil')
                        ->image()
                        ->directory('artist-photos')
                        ->visibility('public')
                        ->nullable(),

                    Forms\Components\TextInput::make('genre')
                        ->label('Genre Musik')
                        ->maxLength(100),

                    Forms\Components\TextInput::make('sosial_media')
                        ->label('Sosial Media')
                        ->url()
                        ->suffixIcon('heroicon-m-globe-alt')
                        ->nullable()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\ImageColumn::make('foto')
                //     ->label('Foto')
                //     ->circular(),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Artis')
                    ->searchable()
                    ->sortable(),

                // Tables\Columns\TextColumn::make('genre')
                //     ->label('Genre')
                //     ->badge()
                //     ->color('primary'),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50),
                    // ->toggleable(isToggledHiddenByDefault: true)

                // Tables\Columns\TextColumn::make('sosial_media')
                //     ->label('Sosial Media')
                //     ->icon('heroicon-m-globe-alt')
                //     ->color('success')
                //     ->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                
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
            'index' => Pages\ListArtists::route('/'),
            'create' => Pages\CreateArtist::route('/create'),
            'edit' => Pages\EditArtist::route('/{record}/edit'),
            'view' => Pages\ViewArtist::route('/{record}'),
        ];
    }
}