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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique(); 
            $table->string('name');
            $table->string('prodi');
            $table->integer('semester');
            $table->string('alamat')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('hobi')->nullable();
            $table->string('bakat')->nullable();
            $table->string('foto_profil')->nullable();
            $table->string('kelas')->nullable();
            $table->string('angkatan', 4)->nullable(); 
            $table->enum('gender', ['P','none', 'L'])->default('none')->nullable();
            $table->string('phone', 50)->nullable(); 
            $table->string('phone_wali', 50)->nullable(); 
            $table->string('email')->unique()->nullable();
            $table->text('bio')->nullable();
            $table->boolean('diawasi')->default('0');
            $table->boolean('pelaporan_ipk')->default('0');
            $table->boolean('penerima_kipk')->default('0');
            $table->enum('status_pengawasan', ['0','1', '2', '3'])->nullable()->default('0');
            $table->enum('status_keanggotaan', ['anggota_aktif', 'pengurus', 'alumni', 'demisioner','ketua_umum'])->nullable()->default('anggota_aktif');
            $table->timestamp('email_verified_at');
            $table->string('password');
            $table->enum('role', ['bph','admin', 'user', 'super_admin','koordinator RPL','koordinator TI', 'koordinator SIKC','koordinator KP','koordinator TM','koordinator PM','koordinator TP','koordinator TRIK','KOMINFO'])->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete(); // Cascade jika user dihapus
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};