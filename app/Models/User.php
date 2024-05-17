<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    // protected $guarded = [];
    // guarded akan meng-eksekusi apa saja yang di request di controller dan jika column nya di masukkan di guarded maka dia tidak akan di eksekusi

    //Gunakan salah satunya saja antar guarded dan fillable!

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    // fillable akan meng-eksekusi apa saja yang di masukkan di fillable dan tidak akan meng-eksekusi apa saja yang tidak di tulis

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
}
