<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('produk')->insert([
            [
                'nama_produk' => 'Indomie Goreng',
                'kategori'    => 'Makanan',
                'harga'       => 3500,
                'stok'        => 100,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'nama_produk' => 'Aqua Botol 600ml',
                'kategori'    => 'Minuman',
                'harga'       => 4000,
                'stok'        => 80,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'nama_produk' => 'Rinso 1kg',
                'kategori'    => 'Kebutuhan Rumah',
                'harga'       => 18000,
                'stok'        => 50,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}
