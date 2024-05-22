<?php

namespace App\Models;

use App\Observers\StoreObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

#[ObservedBy(StoreObserver::class)]


class Store extends Model
{
    protected $fillable = [
        'logo',
        'name',
        'slug',
        'description',
    ];

    public function user(): Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
