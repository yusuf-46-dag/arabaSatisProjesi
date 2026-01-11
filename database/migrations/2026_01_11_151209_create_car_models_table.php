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
        Schema::create('car_models', function (Blueprint $table) {
        $table->id();
        // DİKKAT: constrained('car_brands') diyerek tabloyu otomatik bağladık.
        // references ve on yazmana gerek kalmadı.
        $table->foreignId('brand_id')->constrained('car_brands')->onDelete('cascade');
        
        $table->string('name');
        $table->softDeletes();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_models');
    }
};
