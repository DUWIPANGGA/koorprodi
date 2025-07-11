<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('redirect_links', function (Blueprint $table) {
            $table->id();
            $table->string('short_url')->unique();
            $table->text('destination_url');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->integer('clicks')->default(0);
            $table->dateTime('expires_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('redirect_links');
    }
};