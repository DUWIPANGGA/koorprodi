<?php
namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sktm extends Model
{
    use HasFactory;

    protected $table = 'sktm';
    protected $fillable = [
        'mahasiswa_id',
        'no_surat',
        'alasan',
        'status',
        'keterangan'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(User::class);
    }

    public function dokumen()
    {
        return $this->hasMany(SktmDokumen::class);
    }

    public function getStatusColorAttribute()
    {
        return [
            'pending' => 'warning',
            'approved' => 'success',
            'rejected' => 'danger'
        ][$this->status];
    }
}