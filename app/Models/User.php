<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function request_applications()
    {
        return $this->hasMany(RequestApplication::class);
    }

    public function assignAsRegistrar()
    {
        $this->roles()->attach(2);
    }

    public function assignAsAdmin()
    {
        $this->roles()->attach(1);
    }

    public function assignAsRequester()
    {
        $this->roles()->attach(3);
    }

    public function information()
    {
        return $this->hasOne(Information::class);
    }

    public function isAdmin(): bool
    {
        return $this->campus_id == 1;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'campus_id',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
