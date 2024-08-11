<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function __invoke()
    {
        if (\Auth::check() && !auth()->user()->can('create-user')) {
            return view('home');
        }
    }
}
