<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    // use HasFactory;
    protected $fillable = ['name',];

    public function users(): BelongsToMany
    {
        // return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
        return $this->belongsToMany(User::class, 'user_role');
    }
}
