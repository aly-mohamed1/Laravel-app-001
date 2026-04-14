# If I want to run the Laravel from the terminal 
$ php artisan serve 
or
$ php artisan ser

# The index.php in punlic file 
Responsible for Bootstraping (starting) the Laravel and handling the Request,
through the folder bootsrap/app.php

# In bootsrap/app.php 
Directs you to routes/web.php to start coding   

# After going there it uses that file use Illuminate\Support\Facades\Route;
This file is namespace existed in vendor/laravel/framework/src/ Illuminate\Support\Facades\Route

# If want to make a post on postman It gives me error fir some security issues since you don't have a permission to post so, we start downloading from laravel a library 
$ php artisan install:api

If It wasn't fully downloaded

$ composer show laravel/sanctum
<!-- $ php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider" -->
$ php artisan migrate
$ ls config/sanctum.php

# The folowing step is to remove all routes from web.php and paste it in api.php

# Changing the base url into http://localhost:8000/api/...

# DELETE requests typically don't have a body/payload Unlike POST, PUT, or PATCH requests that send data in the request body, DELETE requests usually only need to identify what to delete (via the URL parameter), not what data to send.

# Route::get('{product}', function($product){return "Product $product Page";
# })->whereNumber('product');
This meeans that this route wil work only if the route is number

# 
