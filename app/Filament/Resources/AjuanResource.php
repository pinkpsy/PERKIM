<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AjuanResource\Pages;
use App\Models\Ajuan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class AjuanResource extends Resource
{
    protected static ?string $model = Ajuan::class;
    

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_pemohon')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->maxLength(16)
                    ->numeric(),
                Forms\Components\TextInput::make('nama_instansi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jabatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('keperluan')
                    ->options([
                        'Pengukuran' => 'Pengukuran',
                        'Survei Menggunakan Drone' => 'Survei Menggunakan Drone',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('detail_keperluan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('surat')
                    ->required()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'application/pdf'])
                    ->maxSize(2048),
                Forms\Components\TextInput::make('nomor')
                    ->required()
                    ->maxLength(15)
                    ->numeric(),
                Forms\Components\Select::make('status')
                    ->options([
                        'Menunggu Verifikasi' => 'Menunggu Verifikasi',
                        'Disetujui' => 'Disetujui',
                        'Ditolak' => 'Ditolak',
                        'Selesai' => 'Selesai',
                    ])
                    ->default('Menunggu Verifikasi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_pemohon')->searchable()->label('Nama Pemohon'),
                Tables\Columns\TextColumn::make('nik')->searchable()->label('NIK'),
                Tables\Columns\TextColumn::make('nama_instansi')->searchable()->label('Nama Instansi'),
                Tables\Columns\TextColumn::make('jabatan'),
                Tables\Columns\TextColumn::make('alamat'),
                Tables\Columns\TextColumn::make('keperluan'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
                Tables\Columns\TextColumn::make('surat')
                    ->label('Surat Permohonan')
                    // ->formatStateUsing(fn($state) => '<a href="' . Storage::url($state) . '" target="_blank">Lihat Surat</a>')
                    ->formatStateUsing(fn($state) => '<a href="' . asset('storage/' . $state) . '" target="_blank">Lihat Surat</a>')
                    ->html(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Menunggu Verifikasi' => 'Menunggu Verifikasi',
                        'Disetujui' => 'Disetujui',
                        'Ditolak' => 'Ditolak',
                        'Selesai' => 'Selesai',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('download_selected_pdf')
                        ->label('Download Selected PDF')
                        ->icon('heroicon-o-document-arrow-down')
                        ->action(function ($records) {
                            $pdf = Pdf::loadView('pdf.ajuan-list', ['ajuans' => $records]);
                            return response()->streamDownload(function () use ($pdf) {
                                echo $pdf->output();
                            }, 'ajuans-selected-' . now()->format('Y-m-d') . '.pdf');
                        }),
                ])->label('Aksi'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Relasi jika ada
        ];
    }
    public static function getLabel(): string
{
    return 'Ajuan';
}

public static function getPluralLabel(): string
{
    return 'Ajuan';
}


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAjuans::route('/'),
            'create' => Pages\CreateAjuan::route('/create'),
            'edit' => Pages\EditAjuan::route('/{record}/edit'),
        ];
    }
}
