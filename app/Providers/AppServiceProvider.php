<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    FilamentColor::register([
            'primary'   => Color::Indigo,   // Warna utama: Biru tua elegan untuk header & tombol utama
            'secondary' => Color::Slate,    // Warna sekunder: Abu-abu modern untuk elemen netral
            'success'   => Color::Emerald,  // Warna sukses: Hijau segar untuk status berhasil
            'danger'    => Color::Rose,     // Warna error: Merah soft yang tetap mencolok
            'warning'   => Color::Amber,    // Warna peringatan: Kuning keemasan yang hangat
            'info'      => Color::Sky,      // Warna info: Biru langit yang ringan dan profesional
    ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
