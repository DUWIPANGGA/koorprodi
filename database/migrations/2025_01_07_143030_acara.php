<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('acara', function (Blueprint $table) {
            $table->id();
            $table->string('nama_acara');
            $table->date('tanggal');
            $table->integer('lama_acara')->comment('Durasi acara dalam hari/jam'); // Tambahkan keterangan jika perlu
            $table->boolean('start')->default(false);
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // Tambahan kolom baru
            $table->text('deskripsi')->nullable();
            $table->string('warna', 20)->nullable(); // warna seperti "red", "#ff0000", dll
            $table->string('lokasi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acara');
    }
};
