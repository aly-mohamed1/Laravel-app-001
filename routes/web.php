<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return 'Welcome to about us page';
});

// Route::get('contact-us', function () {
//     return view('static.contact.index');
// });

Route::view('contact-us', 'static.contact.index');

// Route::get('services', function() {
//     return view('static.services.all-services');
// });

// Route::view('services', 'static.services.all-services');
// Route::view('services/shipping', 'static.services.shipping');
// Route::view('services/transport', 'static.services.transport');
// Route::view('services/delivery', 'static.services.delivery');

Route::prefix('services')->group(function(){
    Route::view('/', 'static.services.all-services');
    Route::view('shipping', 'static.services.shipping');
    Route::view('transport', 'static.services.transport');
    Route::view('delivery', 'static.services.delivery');
    Route::get('list', function(){
        return 'A list of our services are here...';
    });
});

Route::prefix('products')->group(function(){
    Route::view('/', 'static.products.electronics');
    Route::view('home-care', 'static.products.home-care');
    Route::get('list', function(){
        return'A list of all products are here ...';
    });
});
