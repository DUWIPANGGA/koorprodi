<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users'; 
    protected $fillable = [
        'nim',
        'name',
        'prodi',
        'alamat',
        'asal_sekolah',
        'hobi',
        'bakat',
        'kelas',
        'angkatan',
        'gender',
        'phone',
        'phone_wali',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationship methods can be defined here.
     * For example, if this user has related records:
     */
    public function rekap()
    {
         return $this->hasMany(Rekap::class);
    }
}
