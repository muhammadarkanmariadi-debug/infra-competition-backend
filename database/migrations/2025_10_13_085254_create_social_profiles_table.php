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
        Schema::create('social_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('profile_photo');
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('organization_id')->nullable()->constrained('organizations', 'id')->onDelete('cascade');
            $table->foreignId('class_id')->constrained('classes', 'id')->onDelete('cascade');
            $table->foreignId('organization_role_id')->nullable()->constrained('organization_roles', 'id')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_profiles');
    }
};
