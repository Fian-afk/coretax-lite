<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
<<<<<<< HEAD
     *
     * @return void
     */
    public function up()
=======
     */
    public function up(): void
>>>>>>> 68f77847fbb0ee6791645980157172509f5ecb5c
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
<<<<<<< HEAD
     *
     * @return void
     */
    public function down()
=======
     */
    public function down(): void
>>>>>>> 68f77847fbb0ee6791645980157172509f5ecb5c
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
