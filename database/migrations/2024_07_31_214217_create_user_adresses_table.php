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
        Schema::create('user_adresses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('address_line1');
            $table->string('address_line2')->nullable();
            $table->string('city');
            $table->enum('status', ['0','1','2'])->default('0');
            $table->string('posta_code');
            $table->string('country');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_adresses');
    }
};
