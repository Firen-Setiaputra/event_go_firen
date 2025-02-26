<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembelianResource\Pages;
use App\Filament\Resources\PembelianResource\RelationManagers;
use App\Models\Event;
use App\Models\Pembelian;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PembelianResource extends Resource
{
    protected static ?string $model = Pembelian::class;

    protected static ?string $navigationIcon = 'heroicon-s-document';

    public static function form(Form $form): Form
    {
        
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    // ->relationship('user','name')
                    ->required()
                    ->options(User::where('id', auth()->id())->pluck('name','id')),
                Forms\Components\Select::make('event_id')
                    // ->relationship('event','nama_acara')
                    ->required()
                    ->options(Event::where('id', auth()->id())->pluck('nama_acara','id')),
                Forms\Components\TextInput::make('jumlah_tiket')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('total_harga')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('bayar')
                ->options([
                    'transfer' => 'transfer',
                    'kredit' => 'kredit',
                    'e-wallet'=> 'e-wallet',
                ])     
                ->required(),
                Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'pending',
                    'berhasil' => 'berhasil',
                    'gagal'=> 'gagal',
                ])    
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('event.nama_acara')
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah_tiket')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_harga')
                    ->numeric()
                    ->money('idr')
                    ->sortable(),
                Tables\Columns\TextColumn::make('bayar'),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'pending' => 'secondary',
                        'berhasil' => 'success',
                        'gagal' => 'warning'
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPembelians::route('/'),
            'create' => Pages\CreatePembelian::route('/create'),
            'edit' => Pages\EditPembelian::route('/{record}/edit'),
        ];
    }
}
