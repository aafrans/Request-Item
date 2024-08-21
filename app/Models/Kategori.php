<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'kategori';

    // Kolom-kolom yang bisa diisi secara massal
    protected $fillable = [
        'name',
    ];

    // Definisikan relasi dengan model Item
    public function items()
    {
        return $this->hasMany(Item::class, 'kategori_id');
    }
}
