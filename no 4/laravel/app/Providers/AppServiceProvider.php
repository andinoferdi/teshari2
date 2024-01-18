<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Setting;
use App\Models\Checkout;
use App\Models\CheckoutPembelajaran;
use App\Models\komentar;
use App\Models\Rating;
use App\Models\Ratingpembelajaran;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        $barangPembayaran = Checkout::where('status', '1')->count();
        View::share("barangPembayaran", $barangPembayaran);
        Paginator::useBootstrapFive();
        $barangKonfirmasi = Checkout::where('status', '2')->count();
        View::share("barangKonfirmasi", $barangKonfirmasi);
        Paginator::useBootstrapFive();
        $barangDiproses = Checkout::where('status', '3')->count();
        View::share("barangDiproses", $barangDiproses);
        Paginator::useBootstrapFive();
        $barangDikirim = Checkout::where('status', '4')->count();
        View::share("barangDikirim", $barangDikirim);
        Paginator::useBootstrapFive();
        $barangSelesai = Checkout::where('status', '5')->count();
        View::share("barangSelesai", $barangSelesai);
        $settings = Setting::first();
        $barangGagal = Checkout::where('status', '6')->count();
        View::share("barangGagal", $barangGagal);
        $semuaPesanan = Checkout::count();
        View::share("semuaPesanan", $semuaPesanan);
        $pembelajaranPembayaran = CheckoutPembelajaran::where('status', '1')->count();
        View::share("pembelajaranPembayaran", $pembelajaranPembayaran);
        Paginator::useBootstrapFive();
        $pembelajaranKonfirmasi = CheckoutPembelajaran::where('status', '2')->count();
        View::share("pembelajaranKonfirmasi", $pembelajaranKonfirmasi);
        Paginator::useBootstrapFive();
        $pembelajaranPerjalanan = CheckoutPembelajaran::where('status', '3')->count();
        View::share("pembelajaranPerjalanan", $pembelajaranPerjalanan);
        Paginator::useBootstrapFive();
        $pembelajaranPembelajaran = CheckoutPembelajaran::where('status', '4')->count();
        View::share("pembelajaranPembelajaran", $pembelajaranPembelajaran);
        Paginator::useBootstrapFive();
        $pembelajaranSelesai = CheckoutPembelajaran::where('status', '5')->count();
        View::share("pembelajaranSelesai", $pembelajaranSelesai);
        $settings = Setting::first();
        $pembelajaranGagal = CheckoutPembelajaran::where('status', '6')->count();
        View::share("pembelajaranGagal", $pembelajaranGagal);
        $semuaPembelajaran = CheckoutPembelajaran::count();
        View::share("semuaPembelajaran", $semuaPembelajaran);

        $komentar = komentar::count();
        View::share("komentar", $komentar);

        $rating = Rating::count();
        View::share("rating", $rating);

        $ratingPembelajaran = RatingPembelajaran::count();
        View::share("ratingPembelajaran", $ratingPembelajaran);

        $totalRating = $rating + $ratingPembelajaran;
        View::share("totalRating", $totalRating);

        $settings = Setting::first();
        view()->share('settings', $settings);
    }
}
