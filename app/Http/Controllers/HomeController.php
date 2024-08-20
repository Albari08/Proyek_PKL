<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $userId = Auth::id();
        return view('dashboard', compaact('userID'));
        // return redirect('dashboard');
    }
}
