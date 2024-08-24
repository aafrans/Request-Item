<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';

    protected $fillable = [
        'name'
    ];

    /**
     * Get the items for the kategori.
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
