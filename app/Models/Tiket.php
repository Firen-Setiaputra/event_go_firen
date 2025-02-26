<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tiket extends Model
{
    /** @use HasFactory<\Database\Factories\TiketFactory> */
    use HasFactory;

    protected $fillable = [
        'id','event_id','nama_tiket','harga_tiket','kuota_maksimum','status'
    ];
    public function event(): BelongsTo
        {
        return $this->belongsTo(Event::class,'event_id','id');
    }
    public static function canCreate(): bool
{
    return auth()->user()->can('manage books');
}

public static function canEdit($record): bool
{
    return auth()->user()->can('manage books');
}
}
