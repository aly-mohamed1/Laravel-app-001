<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class InitController extends Controller
{
    public function migrations(){

        $tables = [
            'users',
            'post_statuses',
            'reaction_types',
            'posts',
            'replies',
            'reactions',
        ];

        // Creating a migration witjout command lines
        foreach($tables as $table){
            Artisan::call('make:migration', [
                'name' => "create $table"
            ]);
            sleep(1); // To leave a second before creating any table to be in the same order
        }

    }
}
