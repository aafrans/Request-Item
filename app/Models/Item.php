<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
  // Nama tabel yang terkait dengan model ini
  protected $table = 'item';

  // Kolom-kolom yang bisa diisi secara massal
  protected $fillable = [
      'kategori_id',
      'name',
      'specifications',
      'quantity',
      'price',
      'stock',
      'image',
  ];

  // Definisikan relasi dengan model Kategori
  public function kategori()
  {
      return $this->belongsTo(Kategori::class, 'kategori_id');
  }
}
