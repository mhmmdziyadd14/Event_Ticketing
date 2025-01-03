<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DetailTransaksiResource\Pages;
use App\Models\detail_transaksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\SelectFilter;

class DetailTransaksiResource extends Resource
{
    protected static ?string $model = detail_transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Detail Transaksi';
    protected static ?string $navigationGroup = 'Manajemen Transaksi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\Select::make('transaksi_id')
                        ->relationship('transaksi', 'id')
                        ->required()
                        ->label('Transaksi'),

                    Forms\Components\Select::make('tiket_id')
                        ->relationship('tiket', 'nama')
                        ->required()
                        ->label('Tiket'),

                    Forms\Components\TextInput::make('quantity')
                        ->numeric()
                        ->required()
                        ->label('Jumlah')
                        ->minValue(1),

                    Forms\Components\TextInput::make('subtotal')
                        ->numeric()
                        ->required()
                        ->label('Sub Total')
                        ->prefix('Rp')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('transaksi_id')
                    ->label('ID Transaksi')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tiket.nama')
                    ->label('Tiket')
                    ->searchable(),

                Tables\Columns\TextColumn::make('quantity')
                    ->label('Quantity')
                    ->sortable(),

                Tables\Columns\TextColumn::make('subtotal')
                    ->label('Sub Total')
                    ->money('IDR')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('tiket')
                    ->relationship('tiket', 'nama')
                    ->label('Filter Tiket'),

                SelectFilter::make('transaksi')
                    ->relationship('transaksi', 'id')
                    ->label('Filter Transaksi')
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
            'index' => Pages\ListDetailTransaksis::route('/'),
            'create' => Pages\CreateDetailTransaksi::route('/create'),
            'edit' => Pages\EditDetailTransaksi::route('/{record}/edit'),
            'view' => Pages\ViewDetailTransaksi::route('/{record}'),
        ];
    }
}