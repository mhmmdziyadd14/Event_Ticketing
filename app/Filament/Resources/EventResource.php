<?php
namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Storage;

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

                    FileUpload::make('foto')
                        ->label('Poster Event')
                        ->image()
                        ->directory('event_photos')
                        ->visibility('public')
                        ->columnSpanFull()
                        ->saveUploadedFileUsing(function ($file) {
                            $filename = 'event_' . time() . '.' . $file->getClientOriginalExtension();
                            $path = $file->storeAs('event_photos', $filename, 'public');
                            return $path;
                        })
                        ->deleteUploadedFileUsing(function ($file) {
                            Storage::disk('public')->delete($file);
                        }),

                    Forms\Components\Select::make('artists')
                        ->relationship('artists', 'nama')
                        ->multiple()
                        ->label('Artis')
                        ->searchable(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Poster')
                    ->circular(),

                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->label('Nama Acara')
                    ->sortable(),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->searchable()
                    ->label('Deskripsi Acara')
                    ->limit(50),

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

                Tables\Columns\TextColumn::make('artists_count')
                    ->label('Jumlah Artis')
                    ->counts('artists')
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('tickets_count')
                    ->label('Jumlah Tiket')
                    ->counts('tickets')
                    ->badge()
                    ->color('warning'),
            ])
            ->filters([
                SelectFilter::make('organizer')
                    ->relationship('organizer', 'name')
                    ->label('Filter Penyelenggara'),

                SelectFilter::make('venue')
                    ->relationship('venue', 'nama')
                    ->label('Filter Venue'),

                SelectFilter::make('artists')
                    ->relationship('artists', 'nama')
                    ->label('Filter Artis')
                    ->multiple(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->after(function ($record) {
                        // Delete the associated photo when the event is deleted
                        if ($record->foto) {
                            Storage::disk('public')->delete($record->foto);
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->after(function ($records) {
                            // Delete photos for bulk deleted events
                            foreach ($records as $record) {
                                if ($record->foto) {
                                    Storage::disk('public')->delete($record->foto);
                                }
                            }
                        }),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->defaultSort('tanggal', 'desc');
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