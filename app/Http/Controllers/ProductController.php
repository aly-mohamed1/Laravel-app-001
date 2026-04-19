<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // GET {{base_products}}
    {
        return 'A list of all products are here...';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($product) //
    {
        return "Creating a new product which is: $product";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // POST {{base_products}}
    {
        return [
            'message' => 'Product stored',
            'data' => $request->all(),
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "New product with ID $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return [
            'message' => 'Product updated',
            'id' => $id,
            'data' => $request->all()
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Delting the product with ID $id";
    }

    public function byCategory($category)
    {
        return "I will list all products in category $category section";
    }

    public function newArrivals($day)
    {
        return "A list of products arrived last $day";
    }

}
