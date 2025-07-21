<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Nama tabel, kalau beda dari default (yaitu `produks`)
    protected $table = 'produk';

    // Kolom yang bisa diisi secara mass-assignment
    protected $fillable = [
        'nama_produk',
        'kategori',
        'harga',
        'stok',
    ];
}
