<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'item';

    protected $fillable = [
        'kategori_id',
        'name',
        'specifications',
        'quantity',
        'price',
        'stock',
        'image'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
