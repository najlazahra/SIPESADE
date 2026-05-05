<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Tambahkan ini

class Trash extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jenis_sampah',
        'berat',
        'status',
        'keterangan',
    ];

    // TAMBAHKAN FUNGSI INI
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}