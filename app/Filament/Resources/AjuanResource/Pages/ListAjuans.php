<?php

namespace App\Filament\Resources\AjuanResource\Pages;

use App\Filament\Resources\AjuanResource;
use App\Http\Controllers\AjuanController;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Ajuan;

class ListAjuans extends ListRecords
{
    protected static string $resource = AjuanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            // Tambahkan action untuk download semua data ajuan sebagai PDF
            Actions\Action::make('download_all_pdf')
                ->label('Download Semua PDF')
                ->icon('heroicon-o-document-arrow-down')
                ->color('success')
                ->action(function () {
                    $ajuans = Ajuan::all(); // Ambil semua data ajuan
                    $pdf = Pdf::loadView('pdf.ajuan-list', ['ajuans' => $ajuans]); // Siapkan PDF
                    return response()->streamDownload(function () use ($pdf) {
                        echo $pdf->output(); // Output PDF
                    }, 'semua-ajuan-' . now()->format('Y-m-d') . '.pdf'); // Nama file PDF
                }),
        ];
    }

    // Menambahkan kolom dan aksi di tabel jika diperlukan
    protected function getTableActions(): array
    {
        return [
            Actions\EditAction::make(), // Aksi untuk edit
            Actions\DeleteAction::make(), // Aksi untuk delete
        ];
    }
}
