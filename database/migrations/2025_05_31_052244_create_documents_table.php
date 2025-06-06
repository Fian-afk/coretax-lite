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
        Schema::create('documents', function (Blueprint $table) {
        $table->id();
        $table->bigInteger('user_id')->unsigned();
        $table->string('title');
        $table->text('description');
        $table->string('category');
        $table->string('instansi')->nullable();
        $table->string('file_path');
        $table->timestamps();

        // Tambahkan foreign key constraint
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
