<?php

namespace Database\Seeders;

use App\Models\Periode;
use App\Models\Pengurus;
use Illuminate\Database\Seeder;

class KepengurusanSeeder extends Seeder
{
    public function run(): void
    {
        $periode2024 = Periode::create([
            'nama' => 'Kepengurusan 2024/2025',
            'tahun' => '2024',
            'aktif' => true,
        ]);

        $pengurus2024 = [
            ['nama' => 'Ahmad Fauzi', 'jabatan' => 'Ketua Umum', 'divisi' => Pengurus::DIVISI_KETUA_UMUM, 'urutan' => 1],
            ['nama' => 'Siti Nurhaliza', 'jabatan' => 'Wakil Ketua Umum', 'divisi' => Pengurus::DIVISI_WAKIL_KETUA, 'urutan' => 1],
            ['nama' => 'Rina Marlina', 'jabatan' => 'Sekretaris 1', 'divisi' => Pengurus::DIVISI_SEKRETARIS, 'urutan' => 1],
            ['nama' => 'Dewi Sartika', 'jabatan' => 'Sekretaris 2', 'divisi' => Pengurus::DIVISI_SEKRETARIS, 'urutan' => 2],
            ['nama' => 'Budi Santoso', 'jabatan' => 'Bendahara 1', 'divisi' => Pengurus::DIVISI_BENDAHARA, 'urutan' => 1],
            ['nama' => 'Agus Wijaya', 'jabatan' => 'Bendahara 2', 'divisi' => Pengurus::DIVISI_BENDAHARA, 'urutan' => 2],
            ['nama' => 'Mega Wati', 'jabatan' => 'Koordinator', 'divisi' => Pengurus::DIVISI_PSDM, 'urutan' => 1],
            ['nama' => 'Indra Permana', 'jabatan' => 'Anggota', 'divisi' => Pengurus::DIVISI_PSDM, 'urutan' => 2],
            ['nama' => 'Fitri Handayani', 'jabatan' => 'Koordinator', 'divisi' => Pengurus::DIVISI_LITBANG, 'urutan' => 1],
            ['nama' => 'Rizky Pratama', 'jabatan' => 'Anggota', 'divisi' => Pengurus::DIVISI_LITBANG, 'urutan' => 2],
            ['nama' => 'Dian Permata', 'jabatan' => 'Koordinator', 'divisi' => Pengurus::DIVISI_OKK, 'urutan' => 1],
            ['nama' => 'Hendra Gunawan', 'jabatan' => 'Anggota', 'divisi' => Pengurus::DIVISI_OKK, 'urutan' => 2],
            ['nama' => 'Lestari Dewi', 'jabatan' => 'Koordinator', 'divisi' => Pengurus::DIVISI_HUMAS, 'urutan' => 1],
            ['nama' => 'Adi Nugroho', 'jabatan' => 'Anggota', 'divisi' => Pengurus::DIVISI_HUMAS, 'urutan' => 2],
            ['nama' => 'Bayu Saputra', 'jabatan' => 'Koordinator', 'divisi' => Pengurus::DIVISI_DANUS, 'urutan' => 1],
            ['nama' => 'Citra Ayu', 'jabatan' => 'Anggota', 'divisi' => Pengurus::DIVISI_DANUS, 'urutan' => 2],
            ['nama' => 'Rudi Hermawan', 'jabatan' => 'Koordinator', 'divisi' => Pengurus::DIVISI_KOMINFO, 'urutan' => 1],
            ['nama' => 'Tri Wibowo', 'jabatan' => 'Anggota', 'divisi' => Pengurus::DIVISI_KOMINFO, 'urutan' => 2],
            ['nama' => 'Eko Prasetyo', 'jabatan' => 'Koordinator', 'divisi' => Pengurus::DIVISI_KOORPRODI, 'urutan' => 1],
            ['nama' => 'Wulan Sari', 'jabatan' => 'Anggota', 'divisi' => Pengurus::DIVISI_KOORPRODI, 'urutan' => 2],
        ];

        foreach ($pengurus2024 as $p) {
            $periode2024->pengurus()->create($p);
        }

        $periode2023 = Periode::create([
            'nama' => 'Kepengurusan 2023/2024',
            'tahun' => '2023',
            'aktif' => false,
        ]);

        $pengurus2023 = [
            ['nama' => 'Doni Lesmana', 'jabatan' => 'Ketua Umum', 'divisi' => Pengurus::DIVISI_KETUA_UMUM, 'urutan' => 1],
            ['nama' => 'Ratna Sari', 'jabatan' => 'Wakil Ketua Umum', 'divisi' => Pengurus::DIVISI_WAKIL_KETUA, 'urutan' => 1],
            ['nama' => 'Tono Hartono', 'jabatan' => 'Sekretaris', 'divisi' => Pengurus::DIVISI_SEKRETARIS, 'urutan' => 1],
            ['nama' => 'Sari Dewi', 'jabatan' => 'Bendahara', 'divisi' => Pengurus::DIVISI_BENDAHARA, 'urutan' => 1],
            ['nama' => 'Fajar Sidik', 'jabatan' => 'Koordinator', 'divisi' => Pengurus::DIVISI_PSDM, 'urutan' => 1],
            ['nama' => 'Maya Indah', 'jabatan' => 'Koordinator', 'divisi' => Pengurus::DIVISI_LITBANG, 'urutan' => 1],
            ['nama' => 'Roni Kurniawan', 'jabatan' => 'Koordinator', 'divisi' => Pengurus::DIVISI_OKK, 'urutan' => 1],
            ['nama' => 'Nita Permata', 'jabatan' => 'Koordinator', 'divisi' => Pengurus::DIVISI_HUMAS, 'urutan' => 1],
            ['nama' => 'Yoga Pratama', 'jabatan' => 'Koordinator', 'divisi' => Pengurus::DIVISI_DANUS, 'urutan' => 1],
            ['nama' => 'Dika Ardiansyah', 'jabatan' => 'Koordinator', 'divisi' => Pengurus::DIVISI_KOMINFO, 'urutan' => 1],
            ['nama' => 'Putri Amelia', 'jabatan' => 'Koordinator', 'divisi' => Pengurus::DIVISI_KOORPRODI, 'urutan' => 1],
        ];

        foreach ($pengurus2023 as $p) {
            $periode2023->pengurus()->create($p);
        }
    }
}
