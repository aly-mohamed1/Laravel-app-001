<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public static function index(){
        return "All tasks";
    }

    public static function create(){
        echo "<input />";
    }

    public static function edit($tasks){
        echo "<input value= '$tasks' />";
    }

    public static function show($tasks){
        return "Task $tasks page";
    }

    public static function store(Request $request){
        return $request->all();
    }

}
