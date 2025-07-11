<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SktmDokumen extends Model
{
    use HasFactory;

    protected $table = 'sktm_dokumen';
    protected $fillable = ['sktm_id', 'jenis', 'path'];

    public function sktm()
    {
        return $this->belongsTo(Sktm::class);
    }
}