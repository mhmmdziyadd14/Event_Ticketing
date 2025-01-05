<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';
    protected static ?string $navigationLabel = 'Tiket';
    protected static ?string $navigationGroup = 'Manajemen Event';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Tiket')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('harga')
                        ->label('Harga')
                        ->required()
                        ->numeric()
                        ->prefix('Rp'),

                    Select::make('event_id')
                        ->label('Event')
                        ->relationship('event', 'nama')
                        ->required()
                        ->searchable(),

                    Forms\Components\TextInput::make('stok')
                        ->label('Jumlah Stok')
                        ->required()
                        ->numeric()
                        ->minValue(0),

                    Select::make('type')
                        ->label('Tipe Tiket')
                        ->options([
                            'reguler' => 'Reguler',
                            'vip' => 'VIP',
                            'premium' => 'Premium'
                        ])
                        ->required(),

                    Select::make('status')
                        ->label('Status')
                        ->options([
                            'tersedia' => 'Tersedia',
                            'habis' => 'Habis',
                            'segera_hadir' => 'Segera Hadir'
                        ])
                        ->required()
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Tiket')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('harga')
                    ->label('Harga')
                    ->numeric()
                    ->prefix('Rp ')
                    ->sortable(),

                Tables\Columns\TextColumn::make('event.nama')
                    ->label('Event')
                    ->searchable(),

                Tables\Columns\TextColumn::make('stok')
                    ->label('Stok')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'vip' => 'success',
                        'premium' => 'warning',
                        default => 'primary',
                    }),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'habis' => 'danger',
                        'segera_hadir' => 'warning',
                        default => 'success',
                    })
            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
            'edit' => Pages\EditTicket::route('/{record}/edit'),
            'view' => Pages\ViewTicket::route('/{record}'),
        ];
    }
}