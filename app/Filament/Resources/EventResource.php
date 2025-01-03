<?php
namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Tables\Filters\SelectFilter;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Event';
    protected static ?string $navigationGroup = 'Manajemen Event';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('nama')
                        ->required()
                        ->label('Nama Acara')
                        ->maxLength(255),

                    Textarea::make('deskripsi')
                        ->label('Deskripsi Acara')
                        ->rows(4)
                        ->maxLength(5000),

                    Forms\Components\DateTimePicker::make('tanggal')
                        ->required()
                        ->label('Tanggal Acara')
                        ->minDate(now()),

                    Forms\Components\Select::make('organizer_id')
                        ->relationship('organizer', 'name')
                        ->required()
                        ->label('Penyelenggara')
                        ->searchable(),

                    Forms\Components\Select::make('venue_id')
                        ->relationship('venue', 'nama')
                        ->required()
                        ->label('Venue')
                        ->searchable(),

                    FileUpload::make('poster')
                        ->label('Poster Event')
                        ->image()
                        ->directory('event-posters')
                        ->visibility('public'),

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('poster')
                    ->label('Poster')
                    ->circular(),

                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->label('Nama Acara')
                    ->sortable(),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->searchable()
                    ->label('Deskripsi Acara')
                    ->sortable(),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('organizer.name')
                    ->label('Penyelenggara')
                    ->color('primary'),

                Tables\Columns\BadgeColumn::make('venue.nama')
                    ->label('Venue')
                    ->color('success'),
            ])
            ->filters([
                SelectFilter::make('organizer')
                    ->relationship('organizer', 'name')
                    ->label('Filter Penyelenggara'),

                SelectFilter::make('venue')
                    ->relationship('venue', 'nama')
                    ->label('Filter Venue'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'view' => Pages\ViewEvent::route('/{record}'),
        ];
    }
}