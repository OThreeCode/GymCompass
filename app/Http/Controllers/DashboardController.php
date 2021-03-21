<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home()
    {
        if (Auth::user()->isAdmin()) {
            $users = User::all();
        } elseif (Auth::user()->isPersonal()) {
            $users = User::where('personal_id', Auth::user()->id)->get();
        } else {
            $users = null;
        }
        
        return view('home', [
            'users' => $users,
        ]);
    }
}
