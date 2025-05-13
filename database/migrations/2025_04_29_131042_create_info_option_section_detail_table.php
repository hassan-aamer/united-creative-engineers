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
        Schema::create('info_option_section_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('info_section_detail_id')->constrained('info_section_details')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('info_option_id')->constrained('info_options')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_option_section_detail');
    }
};
