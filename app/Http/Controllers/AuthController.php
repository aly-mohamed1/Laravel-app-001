<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request) {
        $data = $request->validated();

        return $data;
    }

    public function register() {}

    public function logout() {}
    /**
     *
     */

    public function forget_password() {}
    /**
     *
     */

    public function reset_password() {}
    /**
     *
     */

    public function change_password() {}
    /**
     *
     */

    public function active_sessions() {}
    /**
     *
     */

    public function logout_all() {}
    /**
     *
     */

    public function logout_current() {}
    /**
     *
     */

    public function logout_others() {}
    /**
     *
     */

}
