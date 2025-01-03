<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiResource\Pages;
use App\Models\Transaksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Card;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'Transaksi'; 
    protected static ?string $navigationGroup = 'Manajemen Transaksi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('event_id')
                        ->relationship('event', 'nama')
                        ->required()
                        ->label('Pilih Event'),
                    
                    Select::make('user_id')
                        ->relationship('user', 'name')
                        ->required()
                        ->label('Pilih Customer'),
                    
                    TextInput::make('grand_total')
                        ->numeric()
                        ->prefix('Rp')
                        ->required()
                        ->label('Grand Total'),
                    
                    Select::make('status')
                        ->options([
                            'pending' => 'Pending',
                            'completed' => 'Completed',
                            'failed' => 'Failed',
                            'cancelled' => 'Cancelled'
                        ])
                        ->required()
                        ->label('Status Transaksi')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BadgeColumn::make('event.nama')
                    ->label('Event')
                    ->color('primary'),
                
                Tables\Columns\BadgeColumn::make('user.name')
                    ->label('Customer')
                    ->color('success'),
                
                Tables\Columns\TextColumn::make('grand_total')
                    ->label('Grand Total')
                    ->money('IDR')
                    ->sortable(),
                
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'pending' => 'warning',
                        'completed' => 'success',
                        'failed' => 'danger',
                        'cancelled' => 'gray'
                    ])
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                        'cancelled' => 'Cancelled'
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
            'view' => Pages\ViewTransaksi::route('/{record}'),
            
        ];
    }
}