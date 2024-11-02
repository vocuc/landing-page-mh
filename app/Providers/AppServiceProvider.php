<?php

namespace App\Providers;

use App\Models\ContactForm;
use App\Models\ProductPayment;
use App\Observers\ContactFormObserver;
use App\Observers\ProductPaymentObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ProductPayment::observe(ProductPaymentObserver::class);

        ContactForm::observe(ContactFormObserver::class);
    }
}
