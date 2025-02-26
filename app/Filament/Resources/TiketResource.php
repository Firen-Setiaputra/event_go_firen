<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TiketResource\Pages;
use App\Filament\Resources\TiketResource\RelationManagers;
use App\Models\Event;
use App\Models\Tiket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TiketResource extends Resource
{
    protected static ?string $model = Tiket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('event_id')
                    // ->Relationship('event','nama_acara')//cara simple
                    ->required()
                    ->options(Event::pluck('nama_acara','id')),//cara yang lebih eksplisit
                Forms\Components\Select::make('nama_tiket')
                    ->required()
                    ->options([
                        'vip' => 'vip',
                        'regular' => 'regular',
                        'early_bird' => 'Early_bird'
                    ]),
                Forms\Components\TextInput::make('harga_tiket')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('kuota_maksimum')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('status')
                    ->options([
                        'tersedia'=> 'tersedia',
                        'habis' => 'habis'
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event.nama_acara')
                    // ->getRelationship('nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_tiket')
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga_tiket')
                    ->numeric()
                    ->money('idr')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kuota_maksimum')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->color([
                        'tersedia' => 'success',
                        'habis' => 'warning'
                    ]),
                Tables\Columns\TextColumn::make('status'),
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
            'index' => Pages\ListTikets::route('/'),
            'create' => Pages\CreateTiket::route('/create'),
            'edit' => Pages\EditTiket::route('/{record}/edit'),
        ];
    }
}
