<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VenueResource\Pages;
use App\Models\Venue;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;

class VenueResource extends Resource
{
    protected static ?string $model = Venue::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationLabel = 'Venue';
    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Venue')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('kapasitas')
                        ->label('Kapasitas')
                        ->numeric()
                        ->required()
                        ->suffix('orang'),

                    Forms\Components\TextInput::make('alamat')
                        ->label('Alamat')
                        ->required(),

                    Forms\Components\TextInput::make('link_alamat')
                        ->label('Link Alamat')
                        ->url()
                        ->suffixIcon('heroicon-m-globe-alt'),

                    Textarea::make('deskripsi')
                        ->label('Deskripsi')
                        ->rows(3),

                    FileUpload::make('foto')
                        ->label('Foto Venue')
                        ->image()
                        ->directory('venues')
                        ->visibility('public')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular(),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Venue')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('kapasitas')
                    ->label('Kapasitas')
                    ->sortable()
                    ->suffix(' orang'),

                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat')
                    ->searchable(),

                Tables\Columns\TextColumn::make('link_alamat')
                    ->label('Link Alamat')
                    ->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kapasitas')
                    ->label('Filter Kapasitas')
                    ->options([
                        '0-100' => '0 - 100 orang',
                        '101-500' => '101 - 500 orang',
                        '501-1000' => '501 - 1000 orang',
                        '1000+' => '1000+ orang'
                    ])
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
            'index' => Pages\ListVenues::route('/'),
            'create' => Pages\CreateVenue::route('/create'),
            'edit' => Pages\EditVenue::route('/{record}/edit'),
            'view' => Pages\ViewVenue::route('/{record}'),
        ];
    }
}