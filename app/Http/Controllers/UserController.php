<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // return User::findMany([
        //     1
        // ]);

        // return User::query()->firstWhere('email', 'splash@yahoo.com');

        // return User::query()
        // ->where('email', 'splash@yahoo.com')
        // ->latest()
        // ->get()
        // ->map(fn ($user) =>[
        //     'name' => $user->name,
        // ]);

        // return User::query()
        // ->where('email', 'splash@yahoo.com')
        // ->latest()
        // ->get();

        // return DB::table("articles")
        // ->select('title', 'slug', 'id')
        // ->get();

        // return DB::table("articles")
        // ->get();

        $users = User::query()
        ->latest()
        ->get();

        // return view("users.index", compact("users"));

        return view("users.index", [
            "people" => $users
        ]);
    }

    public function create()
    {
        return view("users.create");
    }

    public function store(Request $request)
    {
        // dd($request->only('name', 'email', 'password'));
        User::create($request->only('name', 'email', 'password'));
        return redirect('/users');
    }
}
