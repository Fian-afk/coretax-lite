<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumens'; // pastikan ini sesuai nama tabel migrasi

    protected $fillable = ['name', 'status', 'uploader', 'date', 'size'];
}
