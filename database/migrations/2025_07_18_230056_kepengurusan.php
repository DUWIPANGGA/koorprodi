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
        
        if (!Schema::hasTable('pengurus')) {
        Schema::create('pengurus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('jabatan');
            $table->string('divisi');
            $table->string('foto')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }
            if (!Schema::hasTable('periodes')) {

        Schema::create('periodes', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Contoh: "Formadiksi 10", "Kepengurusan 2023-2024"
            $table->string('tahun'); // Contoh: "2023-2024"
            $table->boolean('aktif')->default(false); // Hanya satu yang aktif
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
                Schema::dropIfExists('periodes');
                Schema::dropIfExists('pengurus');

    }
};
