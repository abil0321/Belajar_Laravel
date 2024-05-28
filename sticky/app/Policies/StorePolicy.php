<?php

namespace App\Policies;

use App\Models\Store;
use App\Models\User;
// use Illuminate\Auth\Access\Response;

class StorePolicy
{
    /**
     * Create a new policy instance.
     */
    // public function __construct()
    // {
    //     //
    // }
    public function update(User $user, Store $store): bool
    {
        return $user->id === $store->user_id;
    }

    public function destroy(User $user, Store $store)
    {
        return $this->update($user, $store);
    }

    // public function update(User $user, Store $store): Response
    // {
    //     return $user->id === $store->user_id
    //         ? Response::allow()
    //         : Response::deny('You do not own this store guys.');
    //     // : Response::denyAsNotFound();
    // }
}

<?php

namespace App\Policies;

use App\Models\Store;
use App\Models\User;
// use Illuminate\Auth\Access\Response;

class StorePolicy
{
    /**
     * Create a new policy instance.
     */
    // public function __construct()
    // {
    //     //
    // }

    public function update(User $user, Store $store): bool
    {
        return $user->id === $store->user_id;
    }

    public function destroy(User $user, Store $store): bool
    {
        return $this->update($user, $store);
    }

    //Returns to 404 page
    // public function update(User $user, Store $store): Response
    // {
    //     return $user->id === $store->user_id
    //         ? Response::allow()
    //         // : Response::deny('You do not own this store');
    //         : Response::denyAsNotFound();
    // }
}
