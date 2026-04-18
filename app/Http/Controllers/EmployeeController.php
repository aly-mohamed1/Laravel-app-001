<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nette\Utils\Type;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Employees -> index";

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Employees -> create";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Employees -> store";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Employees -> show $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Employees -> edit";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Employees -> update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Employees -> destroy";
    }

    public function withdraw () {
        return "Employees -> withdraw";
    }
    public function candidate () {
        return "Employees candidate-> ";
    }
    public function new () {
        return "Employees -> new";
    }
    public function training () {
        return "Employees -> training";
    }
    public function vacation () {
        return "Employees -> vacation";
    }
    public function dayOff () {
        return "Employees -> dayOff";
    }
    public function permissions (string $type) {
        return "Employees -> permissions";
    }

}
