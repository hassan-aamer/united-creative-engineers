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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->longText('title')->nullable();
            $table->string('email')->nullable();
            $table->longText('about')->nullable();
            $table->longText('description')->nullable();
            $table->longText('address')->nullable();
            $table->string('phone')->nullable();

            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedIn')->nullable();
            $table->string('instagram')->nullable();

            $table->longText('copyrights')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
