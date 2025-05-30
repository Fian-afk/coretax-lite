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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id')->unsigned();
            $table->text('photo_profile')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('bio')->nullable();
            $table->string('history-upload-document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
