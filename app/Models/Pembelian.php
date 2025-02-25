<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    /** @use HasFactory<\Database\Factories\PembelianFactory> */
    use HasFactory;

    protected $fillable = [
    'id','user_id','event_id','jumlah_tiket','total_harga','bayar','status'
    ];
}
