<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tiket extends Model
{
    /** @use HasFactory<\Database\Factories\TiketFactory> */
    use HasFactory;

    protected $fillable = [
        'id','event_id','nama_tiket','harga_tiket','kuota_maksimum','status'
    ];
    public function event(): HasMany
    {
        return $this->hasMany(Event::class,'event_id','id');
    }
}
