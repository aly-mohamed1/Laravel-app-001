<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'A list of all users...';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // POST {{base_products}}
    {
        return[
            'message' => 'A new user has been stored',
            'data' => $request-> all(),
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        if (!ctype_digit($id)) {
        abort(404, 'Invalid user ID');
        }
        
        return "User with ID $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    // Difference between edit() and update()

    // edit() shows the form or data needed to edit an existing record, It does not save anything.
    // update() saves the changed data to the database, It receives the submitted form or request data and updates the record.

    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        return [
            'message' => 'Updating the user',
            'id' => (int)$id,
            'data' => $request->all(),
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        if (!ctype_digit($id)) {
        abort(404, 'Invalid user ID');
        }

        return "Deleting the user with id". (int)$id;
    }
}
