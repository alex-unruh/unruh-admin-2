<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
Class HomeController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        return view('home');
    }
}
