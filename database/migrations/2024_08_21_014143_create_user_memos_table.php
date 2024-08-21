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
        Schema::create('user_memos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permintaan_id'); // Gunakan nama kolom yang sesuai
            $table->text('memo');
            $table->boolean('price_above_20m');

            // Foreign Key
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Foreign key
            $table->foreign('permintaan_id')->references('id')->on('permintaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_memos');
    }
};
