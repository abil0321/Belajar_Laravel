<?php

namespace App\Observers;

use App\Enums\StoreStatus;
use App\Models\Store;
use Illuminate\Support\Facades\Gate;

class StoreObserver
{
    public function creating(Store $store): void
    {
        $store->slug = str()->slug($store->name);

        // $store->status = request()->user()->isAdmin() || request()->user()->isPartner()
        //     ? StoreStatus::ACTIVE
        //     : StoreStatus::PENDING;
        $store->status = Gate::check('isPartner') ? StoreStatus::ACTIVE : StoreStatus::PENDING;
    }

    public function created()
    {
    }
}
