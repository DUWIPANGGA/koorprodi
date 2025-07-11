<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sktm', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('users')->onDelete('cascade');
            $table->string('no_surat')->nullable();
            $table->text('alasan');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

        Schema::create('sktm_dokumen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sktm_id')->constrained('sktm')->onDelete('cascade');
            $table->string('jenis');
            $table->string('path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sktm_dokumen');
        Schema::dropIfExists('sktm');
    }
};