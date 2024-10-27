<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', // Pastikan ini sesuai dengan kolom di tabel 'items'
        'deskripsi',
    ];
}
