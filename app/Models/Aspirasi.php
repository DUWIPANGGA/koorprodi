<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aspirasi extends Model
{
    use HasFactory;
    
    protected $table = 'aspirasi';
    protected $fillable = ['nama', 'isi', 'ip_address'];
    protected $dates = ['created_at', 'updated_at'];
}
