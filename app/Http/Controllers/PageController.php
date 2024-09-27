<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function index(): View
    {
        return view('index');
    }

    public function registration(): View
    {
        return view('auth.registration');
    }

    public function authorization(): View
    {
        return view('auth.authorization');
    }
}
