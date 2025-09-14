<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id'); // siapa yang mengajukan
            $table->string('action'); // misal: delete, update
            $table->string('table_name'); // tabel yg dimodifikasi
            $table->unsignedBigInteger('record_id'); // id data terkait
            $table->unsignedInteger('row_number')->nullable(); // <-- nomor urut di tabel admin

            $table->json('payload')->nullable(); // simpan data baru untuk update
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->unsignedBigInteger('approved_by')->nullable(); // siapa yang menyetujui/menolak
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
