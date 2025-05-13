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
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedIn')->nullable();
            $table->string('instagram')->nullable();
            $table->string('snapchat')->nullable();

            $table->longText('header')->nullable();
            $table->longText('footer')->nullable();
            $table->longText('copyrights')->nullable();

            $table->string('google_play')->nullable();
            $table->string('app_store')->nullable();
            $table->longText('terms_condition')->nullable();
            $table->longText('return_description')->nullable();
            $table->longText('privacy_description')->nullable();
            $table->longText('map')->nullable();

            $table->bigInteger('sales_development')->nullable();
            $table->bigInteger('website_designer')->nullable();
            $table->bigInteger('marketing_service')->nullable();
            $table->bigInteger('clients')->nullable();
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
