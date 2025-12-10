<?php

namespace App\Exports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AssetExport implements FromCollection, WithHeadings
{
    protected $query;

    public function __construct($query = null)
    {
        $this->query = $query;
    }

    public function collection()
    {
        if ($this->query) {
            return $this->query->get();
        }
        return Asset::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Aset',
            'Kategori',
            'Lokasi',
            'Kondisi',
            'Jumlah',
            'Tanggal Perolehan',
            'Foto',
            'Dibuat',
            'Diupdate'
        ];
    }
}
