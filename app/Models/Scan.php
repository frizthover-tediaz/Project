<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kodebarang',
        'nama',
        'tgl_pinjam',
        'tgl_kembali',
        'namabrg',
        'kelas',
        'nis',
        'qty'
    ];
}
