<?php

use App\Http\Controllers\InitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{

    TaskController,
    EmployeeController,
    ProductController,

    CommentController,
    PostController,
    PostStatusController,
    ReactionController,
    ReactionTypeController,
    ReplyController,
    UserController,

};


use Illuminate\Http\Request;

use Pest\TestCaseMethodFilters\IssueTestCaseFilter;


// Route::get('about', function () {
//     return 'Welcome to about us page';
// });

// Route::get('contact-us', function () {
//     return view('static.contact.index');
// });

// Route::view('contact-us', 'static.contact.index');
// Route::redirect('contact', 'contact-us');

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


    //Since that its under the route of products so, there is no need to write:
    //Route::prefix('products')->controller(ProductController::class)->group(function(){
    Route::controller(ProductController::class)->group(function(){
        Route::get('by-category/{category}', 'byCategory')->whereAlpha('category');
        Route::get('new-arrivals/{day}', 'newArrivals')->whereIn('day', [
                                    //It should be wriiten in camelCase 'newArrivals'
        'sat',
        'sun',
        'mon',
        'tue',
        'wed',
        'thu',
        'fri',
        ]);
    });
    //Route::get('by-category/{category}', [ProductController::class, 'byCategory'])->whereAlpha('category');
    // The byCategory() method is a custom CRUD-related method (for reading products by category),
    // but it's not part of Laravel's standard resource routes.

    // Route::get('new-arrivals/{day}', [ProductController::class, 'newArrivals'])->whereIn('day', [
    //     'sat',
    //     'sun',
    //     'mon',
    //     'tue',
    //     'wed',
    //     'thu',
    //     'fri',
    // ]);
});


// Route::get('users', function(){
//     return 'A list of all users...';
// });

// Route::get('users/{id}', function($id){
//     return "User with ID $id";
// });

Route::prefix('shippers')->group(function(){
    Route::get('/', function(){
        return 'A list of all shippers are here';
    });

    Route::post('/', function(Request $request){
        return $request;
    });

    Route::put('{shippers}', function(Request $request, $shippers){
        return [
            'Request Data' => $request->all(),
            'Shipper-ID' => $shippers
        ];
    });

    Route::delete('delete/{shippers}', function($shippers){
        return "Deleting shipper $shippers";
    })->whereIn('shippers', [
        'FedEx',
        'DHL'
    ]);

    Route::prefix('countries/{shippers}')->group(function(){
        Route::get('/', function($shippers){
            if($shippers === 'FedEx'){
                $FedExdata = [
                    'shipper' => $shippers,
                    'countries' => [
                        'USA' => [
                            'cities' => [
                                'New-York' => ['orders' => 1523],
                                'Los-Angles' => ['orders' => 987],
                                'Chicago' => ['orders' => 754]
                            ],
                            'Total orders' => 3264
                        ],
                        'Canada' => [
                            'cities' => [
                                'Toronto' => ['orders' => 892],
                                'Vancouver' => ['orders' => 456]
                            ],
                            'Total orders' => 1348
                        ]
                    ]
                ];
                return [
                    'message' => 'Number of orders in each country in ech city',
                    $FedExdata];

            } elseif ($shippers === 'DHL'){
                $FedExdata = [
                    'shipper' => $shippers,
                    'countries' => [
                        'Germany' => [
                            'cities' => [
                                'Berlin' =>  ['orders' => 2100],
                                'Munich' =>  ['orders' => 1800],
                                'Humburg' =>  ['orders' => 1500],
                            ],
                            'Total orders' => 5400
                        ],
                        'UK' => [
                            'cities' => [
                                'London' => ['orders' => 3200],
                                'Manchester' => ['orders' => 1200]
                            ],
                            'Total orders' => 4400
                        ]
                    ]
                        ];
                        return [
                            'message' => 'Number of orders in each country in ech city',
                            $FedExdata];
            } else{
                abort(404, 'Shipper not found');
            }
        });
        Route::get('{country}/{city}', function($shippers, $country, $city){
            if ($shippers === 'FedEx'){
                $FedExData = [
                    'USA' => [
                        'New-York' => [
                            'orders' => 1523,
                            'breakdown' => [
                                'pending' => 234,
                                'in_transit' => 456,
                                'delivered' => 789,
                                'failed' => 44
                            ],
                        ],
                        'Los-Angles' => [
                            'orders' => 987,
                            'breakdown' => [
                                'pending' => 156,
                                'in_transit' => 234,
                                'delivered' => 567,
                                'failed' => 30
                            ],
                        ],
                        'Total orders' => 2510
                    ],
                    'Canada' => [
                        'Toronto' => [
                            'orders' => 892,
                            'breakdown' => [
                                'pending' => 123,
                                'in_transit' => 234,
                                'delivered' => 512,
                                'failed' => 23
                            ],
                        ],
                        'Vancouver' => [
                            'orders' => 456,
                            'brakdown' => [
                                'pending' => 67,
                                'in_transit' => 89,
                                'delivered' => 289,
                                'failed' => 11
                            ],
                            'Total orders in Canada' => 1348
                        ],

                        ],
                    ];

                if (isset($FedExData[$country][$city])){
                    $cityInfo = $FedExData[$country][$city];

                    return[
                        'message' => "Order details for $city, $country",
                        'shipper' => $shippers,
                        'country' => $country,
                        'city' => $city,
                        'total orders' => $cityInfo['orders'],
                        'breakdown' => $cityInfo['breakdown']
                    ];
                }

            } elseif ($shippers === 'DHL'){
                $DHLData = [
                    'Germany' => [
                        'Berlin' => [
                            'orders' => 2100,
                            'breakdown' => [
                            'pending' => 300,
                            'in_transit' => 400,
                            'delivered' => 1350,
                            'failed' => 50
                            ],
                        ],

                        'Munich' => [
                            'orders' => 1800,
                            'breakdown' => [
                            'pending' => 250,
                            'in_transit' => 350,
                            'delivered' => 1150,
                            'failed' => 50
                            ]
                        ]
                    ]
                            ];
                            if (isset($DHLData[$country][$city])){
                                $cityInfo = $DHLData[$country][$city];

                                return [
                                    'message' => "Order details $country, $city",
                                    'shipper' => $shippers,
                                    'country' => $country,
                                    'city' => $city,
                                    'total orders' => $cityInfo['orders'],
                                    'breakdown' => $cityInfo['breakdown']
                                ];
                            }
            }

            abort(404, "City '$city' not found in country '$country' for shipper '$shippers'");
        });
    });
})->whereIn('shippers', ['FedEx', 'DHL']);


Route::prefix('tasks')->group(function(){
    // Route::get('/','App\Http\Controllers\TaskController@index');

    // Route::get('/create','App\Http\Controllers\TaskController@create');

    // Route::post('/','App\Http\Controllers\TaskController@store');

    // Route::get('/{tasks}','App\Http\Controllers\TaskController@show');

    // Route::post('/{tasks}/edit','App\Http\Controllers\TaskController@edit');

    // Route::put('/{tasks}','App\Http\Controllers\TaskController@update');

    // Route::delete('/{tasks}','App\Http\Controllers\TaskController@destroy');

    // OR

    // Route::get('/', [TaskController::class, 'index']);

    // Route::get('/create',[TaskController::class, 'create']);

    // Route::post('/',[TaskController::class, 'store']);

    // Route::get('/{tasks}',[TaskController::class, 'show']);

    // Route::post('/{tasks}/edit',[TaskController::class, 'edit']);

    // Route::put('/{tasks}',[TaskController::class, 'update']);

    // Route::delete('/{tasks}',[TaskController::class, 'destroy']);
});

// OR

// Route::prefix('tasks')->controller(TaskController::class)->group(function(){
//     Route::get('/', 'index');

//     Route::get('/create', 'create');

//     Route::post('/', 'store');

//     Route::get('/{tasks}', 'show');

//     Route::post('/{tasks}/edit', 'edit');

//     Route::put('/{tasks}', 'update');

//     Route::delete('/{tasks}', 'destroy');
// });

//OR

//Route::resource('tasks', TaskController::class); // Laravel start doing all (resources) routes automatically which are (index, create, store, show, edit, update, destriy)

//Route::resource('employees', EmployeeController::class);

// OR

//Route::apiResource('tasks', TaskController::class); // Laravel starts doing some resources (index, store, show, update, destroy)

//Route::apiResource('employees', EmployeeController::class);

//OR

// Extra Routes
Route::prefix('employees')-> controller(EmployeeController::class)->group(function(){
    Route::get('withdraw', 'withdraw');
    Route::get('candidate', 'candidate');
    Route::get('new', 'new');
    Route::get('training', 'training');
    Route::get('vacation', 'vacation');
    Route::get('dayOff', 'dayOff');
    Route::get('permissions/{type}', 'permissions');

});

// Route::prefix('products')-> controller(ProductController::class)->group(function(){
//     Route::get('withdraw', 'withdraw');
//     Route::get('candidate', 'candidate');
//     Route::get('new', 'new');
//     Route::get('training', 'training');
//     Route::get('vacation', 'vacation');
//     Route::get('dayOff', 'dayOff');
//     Route::get('permissions/{type}', 'permissions');

// });

Route::fallback(function(){
    return view('page-404');
});


Route::prefix('init')->controller(InitController::class)->group(function(){
    Route::get('migrations', 'migrations');
    Route::get('controllers', 'controllers');
    Route::get('models', 'models');
});

Route::apiResources([
    'tasks' => TaskController::class,
    'employees' => EmployeeController::class,
    'products' => ProductController::class,

    'comments' => CommentController::class,
    'posts' => PostController::class,
    'post-statuses' => PostStatusController::class,
    'reactions' => ReactionController::class,
    'reaction-types' => ReactionTypeController::class,
    'replies' => ReplyController::class,
    'users' => UserController::class,
]);
