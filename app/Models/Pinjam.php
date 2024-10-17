<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    protected $fillable = [
        'nis',
        'nama',
        'barang',
        'waktu',
    ];
}
