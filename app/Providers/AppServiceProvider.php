<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use google\appengine\api\app_identity\AppIdentityService;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.header-jumbotron', function ($view) {
            // $chiesa = auth()->user()->chiesa;
            // if ($chiesa->foto != "") {
            //     $expiration="1388534400";
            //     $string_to_sign = "GET" . "\\n" .  $expiration . "\\n" . "staging.eklesia-195019.appspot.com/public/img/chiese/" . $chiesa->foto;
            //     $signed_string=AppIdentityService::signForApp( $string_to_sign);;
            //     $base_url = "https://storage.googleapis.com/staging.eklesia-195019.appspot.com/public/img/chiese/" . $chiesa->foto;
            //     $encoded_signature = rtrim(strtr(base64_encode($signed_string), '+/', '-_'), '=');
            //     $string=$base_url ."?GoogleAccessId=". AppIdentityService::getServiceAccountName() ."&Expires="
            //     .$expiration . "&Signature=" . $encoded_signature;
            //     $chiesa->foto=$string;
            // }
            $view->with("chiesa", auth()->user()->chiesa);
        });
        view()->composer('partials.navbar', function ($view) {

            $view->with("utente", auth()->user());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
