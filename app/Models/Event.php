<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;

    protected $fillable = [
        'id','nama_acara','deskripsi','tanggal_acara','tanggal_acara','lokasi','poster','kapasitas_maksimal'
    ];

    public function Tiket(): HasMany
    {
        return $this->hasMany(Tiket::class,'tiket_id','id');
    }
}
