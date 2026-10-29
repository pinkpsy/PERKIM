<?php

namespace App\Filament\Resources\AduanResource\Pages;

use App\Filament\Resources\AduanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Aduan;

class ListAduans extends ListRecords
{
    protected static string $resource = AduanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            // Tambahkan action untuk download semua data aduan sebagai PDF
            Actions\Action::make('download_all_pdf')
                ->label('Download Semua PDF')
                ->icon('heroicon-o-document-arrow-down')
                ->color('success')
                ->action(function () {
                    $aduans = Aduan::all();
                    $pdf = Pdf::loadView('pdf.aduan-list', ['aduans' => $aduans]);
                    return response()->streamDownload(function () use ($pdf) {
                        echo $pdf->output();
                    }, 'semua-usulan-' . now()->format('Y-m-d') . '.pdf');
                }),
        ];
    }
}