<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    use HasFactory;
    protected $table = 'user_memos';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'permintaan_id',
        'memo',
        'price_above_20m',
    ];

    // Definisikan relasi dengan model Request
    public function request()
    {
        return $this->belongsTo(permintaan::class, 'permintaan_id');
    }
}
