<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HOmeController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        dd($user);
        echo '<h2>'.$user->username.' You are logged in<h2>';
    }
}
