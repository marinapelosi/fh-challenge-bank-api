<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseMacroServiceProvider extends ServiceProvider
{
    /**
     * Register the application's response macros.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function($data, $message = '', $status = 200){
            return Response::json([
                'status'    => true,
                'message'   => $message,
                'data'      => $data
            ], $status);
        });

        Response::macro('error', function($message, $status = 400){
            return Response::json([
                'status'    => false,
                'message'   => $message
            ], $status);
        });          
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
