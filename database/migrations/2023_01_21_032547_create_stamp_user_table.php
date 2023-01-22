<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stamp_user', function (Blueprint $table) {
            $table->foreignId('stamp_id')->constrained('stamps');
            $table->foreignId('user_id')->constrained('users');
            $table->primary(['stamp_id', 'user_id']);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stamp_user');
    }
};
