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
        Schema::create('admin_requests', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('admin_id');   // siapa admin yang minta
    $table->string('model');                 // model yg diubah (Artikel, Banner, dll)
    $table->unsignedBigInteger('model_id');  // id data yg diubah
    $table->string('action');                // update / delete
    $table->json('data')->nullable();        // data update (kalau update)
    $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
    $table->unsignedBigInteger('approved_by')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('admin_requests');
}

};
