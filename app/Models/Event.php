<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;

    protected $fillable = [
        'id','nama_acara','deskripsi','tanggal_acara','tanggal_acara','poster','kapasitas_maksimal'
    ];

    public function tiket(): BelongsTo
    {
        return $this->belongsTo(Tiket::class,'tiket_id','id');
    }
}
