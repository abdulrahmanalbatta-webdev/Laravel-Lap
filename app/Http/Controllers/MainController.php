<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view("home");
    }

    public function about()
    {
        return view("about");
    }

    public function services()
    {
        return view("services");
    }

    public function contact()
    {
        return view("contact");
    }

    public function users(User $user)
    {
        dd($user);
    }
}
