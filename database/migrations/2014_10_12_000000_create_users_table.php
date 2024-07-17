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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email',255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',50);
            $table->rememberToken();
            $table->string('address',255)->nullable();
            $table->string('phone',50)->nullable();
            $table->string('image',255)->nullable();
            $table->integer('role')->default(0); // 0 là user, 1 là admin
            $table->integer('status')->default(1); // 1 là hiện, 0 là ẩn
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};