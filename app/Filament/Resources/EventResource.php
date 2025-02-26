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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_acara')
                    ->label('Nama Acara')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi')
                ->label('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('tanggal_acara')
                ->label('Tanggal Acara')
                    ->date()
                    ->rules(['after_or_equal:today'])
                    ->native(false)
                    ->displayFormat('d/m/Y')
                    // ->format('Y-m-d H:i:s')
                    ->required(),
                Forms\Components\TextInput::make('lokasi')
                ->placeholder('Masukkan Lokasi')
                ->label('Lokasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('poster')
                ->label('Poster')
                    ->disk('public')
                    ->directory('posters')
                    ->acceptedFileTypes(['image/jpeg','image/jpg','image/png'])
                    ->maxSize('20048')
                    ->image(),
                Forms\Components\TextInput::make('kapasitas_maksimal')
                ->label('Kapasitas Maksimal')
                    ->required()
                    ->numeric()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_acara')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_acara')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lokasi')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\ImageColumn::make('poster')
                    ->disk('public')
                    ->square()
                    ->size(50),
                Tables\Columns\TextColumn::make('kapasitas_maksimal')
                    ->searchable()
                    ->alignCenter(),
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

                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
