<?php

namespace App\Http\Controllers;

use App\Enums\StoreStatus;
use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Routing\Controllers;
// use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
// class StoreController extends Controller implements Controllers\HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    // public static function middleware()
    // {
    //     // return ['auth'];

    //     // new Controllers\Middleware('auth', only: ['index']);
    //     // new Controllers\Middleware('auth', except: ['index']);
    // }
    public function index()
    {
        $store = Store::query()
            ->where('status', StoreStatus::ACTIVE)
            ->latest()
            ->get();
        return view("stores.index", [
            // 'stores' => Store::latest()->get(),
            'stores' => $store,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if (!auth()->check()) {
        //     return to_route('login');
        // }
        return view("stores.form", [
            'store' => new Store(),
            'meta_page' => [
                'title' => 'Create Store',
                'description' => 'Create store : ',
                'url' => route('stores.store'),
                'method' => 'POST'
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // dd($request->file('logo'));
        $file = $request->file('logo');
        $request->user()->stores()->create([
            ...$request->validated(),
            ...['logo' => $file->store('images/stores')],
        ]);

        return to_route('stores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store, Request $request)
    {
        // cara untuk membatasi edit hanya untuk pemilik/pembuat(user) store nya saja yang bisa edit
        // abort_if($request->user()->isNot($store->user), 401, 'Lu ga punya hak buat edit punya orang tot');
        Gate::authorize('update', $store);
        return view('stores.form', [
            'store' => $store,
            'meta_page' => [
                'title' => 'Edit Store',
                'description' => 'Edit store : ' . $store->name,
                'url' => route('stores.update', $store->id),
                'method' => 'PUT'
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Store $store)
    {
        if ($request->hasFile('logo')) {
            Storage::delete($store->logo);
            $file = $request->file('logo');
        } else {
            $file = $store->logo;
        }

        $store->update([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $file->store('images/stores'),
        ]);

        return to_route('stores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
