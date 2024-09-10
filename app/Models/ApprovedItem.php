<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovedItem extends Model
{
    use HasFactory;

    // Tentukan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'user_id',
        'item_id',
        'quantity',
        'status',
        'memo',
    ];

    // Definisi status permintaan
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    // Relasi ke model User (pengguna yang membuat permintaan)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model Item (barang yang diminta)
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // Method untuk memeriksa apakah status permintaan adalah 'pending'
    public function isPending()
    {
        return $this->status === self::STATUS_PENDING;
    }

    // Method untuk memeriksa apakah status permintaan adalah 'approved'
    public function isApproved()
    {
        return $this->status === self::STATUS_APPROVED;
    }

    // Method untuk memeriksa apakah status permintaan adalah 'rejected'
    public function isRejected()
    {
        return $this->status === self::STATUS_REJECTED;
    }

    // Method untuk menyetujui permintaan
    public function approve()
    {
        $this->status = self::STATUS_APPROVED;
        $this->save();
    }

    // Method untuk menolak permintaan
    public function reject()
    {
        $this->status = self::STATUS_REJECTED;
        $this->save();
    }
}
