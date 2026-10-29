<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationGroup = 'Pejabat Struktural';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Profil Kepala Dinas';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()
                ->schema([
                    FileUpload::make('photo')
                        ->image()
                        ->directory('profile-photos'),
                    TextInput::make('name')->required(),
                    TextInput::make('position')->required(),
                    TextInput::make('birth_place')->required(),
                    DatePicker::make('birth_date')->required(),
                    Textarea::make('office_address')->required(),
                ])->columnSpan(['lg' => 2]),

            Card::make()
                ->schema([
                    // Riwayat Jabatan Struktural
                    Section::make('Riwayat Jabatan Struktural')
                        ->schema([
                            Repeater::make('structuralPositions')
                                ->relationship()
                                ->schema([
                                    TextInput::make('period'),
                                    TextInput::make('position_name'),
                                    TextInput::make('skpd'),
                                ]),
                        ]),

                    // Riwayat Pendidikan Formal
                    Section::make('Riwayat Pendidikan Formal')
                        ->schema([
                            Repeater::make('formalEducations')
                                ->relationship()
                                ->schema([
                                    TextInput::make('tmt'),
                                    TextInput::make('degree'),
                                    TextInput::make('institution'),
                                ]),
                        ]),

                    // Riwayat Pendidikan Non Formal
                    Section::make('Riwayat Pendidikan Non Formal')
                        ->schema([
                            Repeater::make('nonFormalEducations')
                                ->relationship()
                                ->schema([
                                    TextInput::make('tmt'),
                                    TextInput::make('name'),
                                ]),
                        ]),
                ])->columnSpan(['lg' => 1]),
        ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('position')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_place')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('photo')
                    ->searchable(),
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}
