<?php

namespace App\Models;

use App\Models\LaporanOrganisasi;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users'; 
    protected $fillable = [
        'id',
        'nim',
        'name',
        'semester',
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
        'pelaporan_ipk' => 'boolean',
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
    public function organisasis()
{
    return $this->belongsToMany(Organisasi::class, 'user_organisasi')
        ->withPivot([
            'semester',
            'jabatan', 
            'created_at',
            'updated_at'
        ])
        ->withTimestamps();
}
    public function laporanOrganisasi()
{
    return $this->belongsToMany(Organisasi::class, 'user_organisasi')
        ->withPivot('semester')
        ->withTimestamps();
}
// app/Models/User.php
// public function laporanOrganisasi()
// {
//     return $this->hasMany(LaporanOrganisasi::class);
// }
}
