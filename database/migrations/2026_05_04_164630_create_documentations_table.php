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
    Schema::create('documentations', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('image'); // Tempat simpan path foto
        $table->string('category'); // Kegiatan, Edukasi, Inovasi
        $table->date('event_date');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentations');
    }
};
