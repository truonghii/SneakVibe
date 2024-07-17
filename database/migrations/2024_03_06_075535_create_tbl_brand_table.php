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
        Schema::create('tbl_brand', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name',255);
            $table->string('brand_logo',255)->nullable();
            $table->text('brand_description')->nullable();
            $table->integer('brand_status')->default(1);// 0 là ẩn 1 là hiện
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_brand');
        
    }
};