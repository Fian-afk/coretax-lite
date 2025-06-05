<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumens';

    protected $fillable = [
        'name',
        'status',
        'uploader',
        'date',
        'size',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];
}
