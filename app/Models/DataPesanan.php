<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPesanan extends Model
{
    use HasFactory;
    protected $table = '_data__pesanan';
    protected $fillable =[
        'id',
        'id_user',
        'id_produk',
        'nama_pemesan',
        'alamat',
        'no_hp',
        'jumlah',
        'total_harga',
        'created_at', 
        'updated_at'
    ];
}
