<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembelian extends Model
{
    /** @use HasFactory<\Database\Factories\PembelianFactory> */
    use HasFactory;

    protected $fillable = [
    'id','user_id','event_id','jumlah_tiket','total_harga','bayar','status'
    ];

    public function user(): BelongsTo
    {
    return $this->belongsTo(user::class,'user_id','id');
    }

    public function event(): BelongsTo
    {
    return $this->belongsTo(Event::class,'event_id','id');
}
}
