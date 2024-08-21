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
        Schema::create('item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_id');
            $table->string('name');
            $table->text('specifications')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('stock', 10, 2)->default(0);
            $table->string('image')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};
