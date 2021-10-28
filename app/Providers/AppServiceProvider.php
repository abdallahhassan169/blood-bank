<?php

namespace App\Providers;
use App\Governorate;
use App\City;
use App\Contact;
use App\Notification;
use App\Categeory;
use App\Setting;
use App\Post;
use App\Category;

use App\Token;
use App\DonationRequest;

use App\BloodType;

use Illuminate\Support\ServiceProvider;

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
    }
}
