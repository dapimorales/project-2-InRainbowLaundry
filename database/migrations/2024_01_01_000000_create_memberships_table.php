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
       Schema::create('memberships', function (Illuminate\Database\Schema\Blueprint $table) {
        $table->id();
        $table->string('nama_lengkap');
        $table->text('alamat_lengkap');
        $table->string('kota');
        $table->string('kode_pos');
        $table->string('email');
        $table->string('nomor_whatsapp');
        $table->date('tanggal_lahir');
        $table->string('paket'); // silver, gold, atau platinum
        $table->integer('harga');
        $table->integer('bonus_saldo');
        $table->timestamps();
        $table->date('tgl_mulai');
        $table->date('tgl_expired');
        $table->string('status')->default('aktif');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
