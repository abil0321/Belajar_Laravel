<?php

namespace App\Http\Controllers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        // $users = DB::table("users")->get();

        // $users = DB::table("users")->limit(1)->get();
        // $users = DB::table("users")->take(1)->get();

        // $users = DB::table("users")->get()->toArray();

        // $users = DB::table("users")->find(1);

        // $users = DB::table("users")->where('email', 'salsaabilmuhammad45@gmail.com')->first();
        // $users = DB::table("users")->where('email', 'like', '%@yahoo.com')->get();
        // $users = DB::table("users")->where('email', 'like', '%@gmail.com')->first();

        // $users = DB::table("users")
        // ->where('email', 'like', '%@gmail.com')
        // ->latest() // orderBy('id', 'desc')
        // ->oldest() // orderBy('id', 'asc')
        // ->first();

        $users = DB::table("users")
        ->where('id', 2) // find(2)
        ->first();

        // return $users;
        // return $users->email;

        dd($users);
    }
}
