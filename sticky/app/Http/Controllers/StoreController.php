<?php

namespace App\Http\Controllers;

use App\Enums\StoreStatus;
use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

// class StoreController extends Controller implements Controllers\HasMiddleware
class StoreController extends Controller
{
    // public static function middleware()
    // {
    //     return [
    //         new Controllers\Middleware('auth', except: ['index']),
    //     ];
    // }
    /**
     * Display a listing of the resource.
     */
    // public static function middleware()
    // {
    //     // return ['auth'];

    //     // new Controllers\Middleware('auth', only: ['index']);
    //     // new Controllers\Middleware('auth', except: ['index']);
    // }

    public function list()
    {
        $stores = Store::query()
            ->latest()
            ->paginate(10);

        return view('stores.list', [
            'stores' => $stores
        ]);
    }

    public function approve(Store $store)
    {
        $store->status = StoreStatus::ACTIVE;
        $store->save();

        return back();
    }
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

        $store = new Store();
        return view("stores.form", [
            'store' => $store,
            'meta_page' => [
                'title' => 'Create Store',
                'description' => 'Create new Store',
                'method' => 'POST',
                'text-btn' => 'Create',
                'url' => route('stores.store')
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // dd($request->file('logo'));
        // if (!auth()->check()) {
        //     return to_route('login');
        // }
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
    public function edit(Request $request, Store $store)
    {
        // abort_if($request->user()->isNot($store->user), 401);
        // Gate::authorize('update-store', $store);
        Gate::authorize('update', $store);

        return view('stores.form', [
            'store' => $store,
            'meta_page' => [
                'title' => 'Edit Store',
                'description' => 'Edit Store: ' . $store->name,
                'method' => 'PUT',
                'text-btn' => 'update',
                'url' => route('stores.update', $store)
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Store $store)
    {
        $store->update([
            'name' => $request->name,
            'description' => $request->description,
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
