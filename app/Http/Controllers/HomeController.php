<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkouts; 
use Auth;

class HomeController extends Controller
{
    public function dashboard()
{
    $checkouts = Checkouts::with('Camps')->whereUsersId(Auth::id())->get();
    return view ('user/dashboard', [
        'checkouts' => $checkouts
    ]);
}
}
