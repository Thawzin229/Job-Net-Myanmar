<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_profiles', function (Blueprint $table) {
            $table->foreignId('admin_id');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('birthday')->nullable();
            $table->string('image')->nullable();
            $table->string('job')->nullable();
            $table->string('avatar')->nullable();
            $table->string('gender')->nullable();
            $table->string('address_number')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('hobby')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_profiles');
    }
};
