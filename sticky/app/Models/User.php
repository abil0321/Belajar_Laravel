<?php

namespace App\Models;

use App\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function stores(): Relations\HasMany
    {
        return $this->hasMany(Store::class);
    }

    // public function roles(): Relations\BelongsToMany
    // {
    //     // return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    //     return $this->belongsToMany(Role::class, 'user_role');
    // }

    // public function assignRole(Role $role): Model
    // {
    //     // return $this->roles()->attach($role); // attach untuk memasukkan multiple ID
    //     return $this->roles()->save($role);
    // }

}
