<?php

use App\Http\Controllers\API\Backend\ArticleController;
use Illuminate\Support\Facades\Route;







Route::domain('{subdomain}.spacenews.test')->group(function () {


    Route::prefix('v1/frontend')->group(function () {

        Route::get('/', function (string $subdomain) {
            echo $subdomain;
        });
    });

    // Add more routes for subdomain2 here

});
