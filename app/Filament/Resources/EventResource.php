<?php
namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->label('Nama Acara')
                    ->maxLength(255),
                
                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi Acara')
                    ->maxLength(5000),
                
                Forms\Components\DateTimePicker::make('tanggal')
                    ->required()
                    ->label('Tanggal Acara')
                    ->minDate(now()), // Pastikan tanggal tidak bisa di masa lalu
                
                Forms\Components\Select::make('organizer_id')
                    ->relationship('organizer', 'name') // Menggunakan relasi untuk memilih penyelenggara
                    ->required()
                    ->label('Penyelenggara'),
                
                Forms\Components\Select::make('venue_id')
                    ->relationship('venue', 'nama') // Menggunakan relasi untuk memilih venue
                    ->required()
                    ->label('Venue'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable()->label('Nama Acara'),
                Tables\Columns\TextColumn::make('deskripsi')->label('Deskripsi'),
                Tables\Columns\TextColumn::make('tanggal')->label('Tanggal'),
                Tables\Columns\BadgeColumn::make('organizer.name')->label('Penyelenggara'), // Menggunakan relasi
                Tables\Columns\BadgeColumn::make('venue.nama')->label('Venue'), // Menggunakan relasi
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
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
            // Tambahkan relasi jika diperlukan
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}