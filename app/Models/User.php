<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const TYPE_ADMIN = 0;
    const TYPE_USER = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // $table->id();
        // $table->string('name');
        // $table->string('email')->unique();
        // $table->string('password');
        // $table->string('address')->nullable();
        // $table->string('avatar')->nullable();
        // $table->string('gender');
        // $table->date('birthdate');
        // $table->integer('phone');
        // $table->string('role')->default('member');
        // $table->timestamp('email_verified_at')->nullable();
        // $table->rememberToken();
        // $table->timestamps();
        'name',
        'email',
        'password',
        'address',
        'avatar',
        'gender',
        'birthdate',
        'phone',
        'email_verified_at',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function isAdmin()
    {
        return $this->role === self::TYPE_ADMIN;
    }
}