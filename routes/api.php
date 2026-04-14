<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('about', function () {
    return 'Welcome to about us page';
});

// Route::get('contact-us', function () {
//     return view('static.contact.index');
// });

Route::view('contact-us', 'static.contact.index');
Route::redirect('contact', 'contact-us');

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

Route::prefix('types')->group(function(){
    Route::view('/', 'static.types.all-types');
    Route::view('laptops', 'static.types.laptops');
    Route::view('phones', 'static.types.phones');
    Route::get('list', function(){
        return 'A list of all types...';
    });
});

Route::prefix('transportation')->group(function(){
    Route::view('/', 'static.transportation.all-transportation');
    Route::view('trains', 'static.transportation.trains');
    Route::view('cars', 'static.transportation.cars');
    Route::view('ships', 'static.transportation.ships');
    Route::get('list', function(){
        return 'A list of transportatioins';
    });
});

Route::fallback(function(){
    return view('page-404');
});

Route::prefix('products')->group(function(){
    Route::get('', function(){
        return'A list of all products are here...';
    });

    Route::get('{product}', function($product){
        return "Product $product Page";
    })->whereNumber('product');

    Route::post('/', function(Request $request){
        return $request;
    });

    Route::put('{product}', function(Request $request, $product){
        return [
            'Request Data' => $request->all(),
            'Product-ID' => $product
        ];
    });

    Route::delete('{product}', function($product){
        return "Deleting product $product";
    });

    Route::get('by-category/{category}', function($category){
        return "I will list all products in category $category";
    });
});


Route::get('users', function(){
    return 'A list of all users...';
});

Route::get('users/{id}', function($id){
    return "User with ID $id";
});

