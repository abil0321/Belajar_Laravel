<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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
        return view("users.form", [
            'user' => new User(),
            'page_meta' => [
                'title' => 'Create new User',
                'method' => 'post',
                'url' => '/users',
                'submit_text' => 'Save',
            ],
        ]);
    }

    public function store(UserRequest $request)
    {
        // dd($request->only('name', 'email', 'password'));
        // $validated = $request->validate([
        //     'name' => ['required', 'min:3', 'max:255', 'string'],
        //     'email'=> ['required', 'email'],
        //     'password' => ['required', 'min:8']
        // ]);

        // dd([
        //     'only' => $request->only('name', 'email', 'password'),
        //     'validated' => $validated
        // ]);
        // User::create($request->validate($this->requestvalidated()));
        User::create($request->validated());
        return redirect('/users');
    }

    // public function show($id)
    public function show(User $user)
    {
        // find hanya berlaku untuk id
        // $user = User::findOrFail($id);
        // $user = User::where('id', $id)->firstOrFail();

        // jika ingim menggunakan selain id
        // $user = User::where('email', 'bavemyfo@mailinator.com')->where('id', 7)->first();

        // abort_if(!$user, 404);
        // dd($user);
        return view('users.show', [
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        return view('users.form', [
            'user' => $user,
            'page_meta' => [
                'title' => 'Edit User: ' . $user->name,
                'method' => 'put',
                'url' => '/users/' . $user->id,
                'submit_text' => 'Update',
            ],
        ]);
    }

    public function update(UserRequest $request, User $user)
    {
        // $validated = $request->validate([
        //     'name' => ['required', 'min:3', 'max:255', 'string'],
        //     'email'=> ['required', 'email'],
        //     'password' => ['required', 'min:8']
        // ]);
        // dd('updated');
        // $user->update($request->validate($this->requestvalidated()));
        $user->update($request->validated());
        return redirect('/users');
    }

    // protected function requestvalidated(): array
    // {
    //     return [
    //         'name' => ['required', 'min:3', 'max:255', 'string'],
    //         'email'=> ['required', 'email'],
    //         'password' => ['required', 'min:8']
    //     ];
    // }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('users');
    }
}
