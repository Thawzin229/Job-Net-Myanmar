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
        Schema::create('job_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jobs_id');
            $table->string('email');
            $table->string('job_title');
            $table->string('fee');
            $table->foreignId('location');
            $table->foreignId('job_type');
            $table->string('category');
            $table->string('job_tag');
            $table->mediumText('description');
            $table->mediumText('requirement');
            $table->string('application_email');
            $table->string('deadline');
            $table->string('website_link');
            $table->string('tag_line');
            $table->string('twitter_user_name');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_details');
    }
};
