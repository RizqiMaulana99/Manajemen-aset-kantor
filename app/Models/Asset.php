<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
    'nama_aset',
    'kategori',
    'lokasi',
    'kondisi',
    'jumlah',
    'tanggal_perolehan',
    'foto',
];

}
