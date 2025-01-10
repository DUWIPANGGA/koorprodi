<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $table = 'aspirasi';
    protected $fillable = ['nama', 'isi', 'ip_address'];
    protected $dates = ['created_at', 'updated_at'];
}
