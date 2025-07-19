<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;
    protected $table = 'pengurus';

    protected $fillable = ['nama', 'jabatan', 'divisi', 'foto', 'urutan'];

    // Konstanta untuk divisi
    const DIVISI_KETUA_UMUM = 'Ketua Umum';
    const DIVISI_WAKIL_KETUA = 'Wakil Ketua Umum';
    const DIVISI_BENDAHARA = 'Bendahara';
    const DIVISI_SEKRETARIS = 'Sekretaris';
    const DIVISI_PSDM = 'PSDM';
    const DIVISI_LITBANG = 'Litbang';
    const DIVISI_OKK = 'OKK';
    const DIVISI_HUMAS = 'Humas';
    const DIVISI_DANUS = 'Danus';
    const DIVISI_KOMINFO = 'Kominfo';
    const DIVISI_KOORPRODI = 'Koorprodi';

    public static function divisiList()
    {
        return [
            self::DIVISI_KETUA_UMUM => 'Ketua Umum',
            self::DIVISI_WAKIL_KETUA => 'Wakil Ketua Umum',
            self::DIVISI_BENDAHARA => 'Bendahara',
            self::DIVISI_SEKRETARIS => 'Sekretaris',
            self::DIVISI_PSDM => 'PSDM',
            self::DIVISI_LITBANG => 'Litbang',
            self::DIVISI_OKK => 'OKK',
            self::DIVISI_HUMAS => 'Humas',
            self::DIVISI_DANUS => 'Danus',
            self::DIVISI_KOMINFO => 'Kominfo',
            self::DIVISI_KOORPRODI => 'Koorprodi',
        ];
    }
    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}