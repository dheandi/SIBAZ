<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAnggotaModels extends Model
{
    use HasFactory;
    protected $table = 'data_anggota';
    protected $fillable = [
        'id',
        'namaAnggota',
        'username',
        'password',
        'created_at',
        'updated_at'
    ];
}
