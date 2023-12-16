<?php

namespace App\Models;

use App\Models\Sim;
use App\Models\Skck;
use App\Models\Kritik;
use App\Models\Survei;
use App\Models\Profile;
use App\Models\Pengaduan;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nik',
        'fullname',
        'nickname',
        'password',
        'phone_number',
        'email',
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

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
     public function sim()
    {
        return $this->hasMany(Sim::class);
    }
     public function skck()
    {
        return $this->hasMany(Skck::class);
    }
     public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }
     public function kritik()
    {
        return $this->hasMany(Kritik::class);
    }
    public function survei()
    {
        return $this->hasMany(Survei::class);
    }
}