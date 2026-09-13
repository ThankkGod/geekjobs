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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('job_type');
            $table->string('experince_level');
            $table->double('salary');
            $table->string('location');
            $table->string('vacancy');
            $table->date('application_deadline');
            $table->string('feature_image');
            $table->string('responsibilities');
            $table->string('requirement');
            $table->string('gender');
            $table->string('slug');
            $table->text('description');
            $table->enum('status', ['available','expired'])->default('available');
            $table->enum('published_at', ['published','pending'])->default('published');
            $table->timestamp('job_expired');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            // $table->foreignId('personal_id')->constrained('personals')->cascadeOnDelete();
            // $table->foreignId('education_id')->constrained('education')->cascadeOnDelete();
            // $table->foreignId('work_id')->constrained('works')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
