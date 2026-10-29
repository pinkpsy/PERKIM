<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AduanResource\Pages;
use App\Models\Aduan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Fieldset;
use Barryvdh\DomPDF\Facade\Pdf;

class AduanResource extends Resource
{
    protected static ?string $model = Aduan::class;
    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_pelapor')
                    ->required(),
                TextInput::make('nik')  // Add NIK field here
                    ->label('NIK Pelapor')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('ktp_pelapor')
                    ->required()
                    ->image(),
                TextInput::make('alamat_rumah')
                    ->required(),
                FileUpload::make('ktp_pemilik')
                    ->required()
                    ->image(),
                FileUpload::make('foto_rumah')
                    ->multiple()
                    ->image(),
                Fieldset::make('Kriteria Atap')
                    ->schema([
                        CheckboxList::make('kriteria_atap')
                            ->options([
                                'daun' => 'Daun',
                                'seng' => 'Seng',
                                'genteng' => 'Genteng',
                            ]),
                    ]),
                Fieldset::make('Kriteria Dinding')
                    ->schema([
                        CheckboxList::make('kriteria_dinding')
                            ->options([
                                'beton' => 'Beton',
                                'bata' => 'Bata',
                                'kayu' => 'Kayu',
                                'seng' => 'Seng',
                                'calci_board' => 'Kalsiboard',
                                'anyaman_bambu' => 'Anyaman Bambu',
                            ]),
                    ]),
                Fieldset::make('Kriteria Lantai')
                    ->schema([
                        CheckboxList::make('kriteria_lantai')
                            ->options([
                                'kayu' => 'Kayu',
                                'keramik' => 'Keramik',
                                'cor' => 'Cor',
                            ]),
                    ]),
                Select::make('status')
                    ->options([
                        'Menunggu Verifikasi' => 'Menunggu Verifikasi',
                        'Diterima' => 'Diterima',
                        'Ditolak' => 'Ditolak',
                        'Selesai' => 'Selesai',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_pelapor')
                    ->searchable()->label('Nama Pelapor'),
                TextColumn::make('nik')  // Display NIK in the table
                    ->searchable()->label('NIK'),
                TextColumn::make('alamat_rumah')
                    ->searchable()->label('Alamat Rumah'),
                ImageColumn::make('ktp_pelapor')->label('KTP Pelapor'),
                ImageColumn::make('ktp_pemilik')->label('KTP Pemilik'),
                ImageColumn::make('foto_rumah')
                    ->getStateUsing(function (Aduan $record): ?string {
                        $photos = $record->foto_rumah;
                        return $photos ? (is_array($photos) && count($photos) > 0 ? $photos[0] : null) : null;
                    })
                    ->label('Foto Rumah (Sisi Depan)'),
                TextColumn::make('status'),
                TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('download_pdf')
                    ->label('Download PDF')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('success')
                    ->action(function (Aduan $record) {
                        $pdf = Pdf::loadView('pdf.aduan-detail', ['aduan' => $record]);

                        $pdf->setOptions([
                            'dpi' => 150,
                            'defaultFont' => 'sans-serif',
                            'isHtml5ParserEnabled' => true,
                            'isRemoteEnabled' => true
                        ]);

                        return response()->streamDownload(function () use ($pdf) {
                            echo $pdf->output();
                        }, 'aduan-' . $record->id . '.pdf');
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('download_selected_pdf')
                        ->label('Download Selected PDF')
                        ->icon('heroicon-o-document-arrow-down')
                        ->action(function ($records) {
                            $pdf = Pdf::loadView('pdf.aduan-list', ['aduans' => $records]);
                            return response()->streamDownload(function () use ($pdf) {
                                echo $pdf->output();
                            }, 'aduans-selected-' . now()->format('Y-m-d') . '.pdf');
                        }),
                ])->label('Aksi'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
public static function getLabel(): string
{
    return 'Usulan';
}

public static function getPluralLabel(): string
{
    return 'Usulan';
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAduans::route('/'),
            'create' => Pages\CreateAduan::route('/create'),
            'edit' => Pages\EditAduan::route('/{record}/edit'),
        ];
    }
}