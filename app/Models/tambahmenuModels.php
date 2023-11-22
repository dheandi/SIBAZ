<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambahmenuModels extends Model
{
    use HasFactory;
    protected $table = 'tambah_menu';
    protected $fillable = [
        'id',
        'nama_menu',
        'deskripsi',
        'harga',
        'gambar',
        'created_at',
        'updated_at'
    ];
}
