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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('generation_id')->constrained('generations', 'id')->onDelete('cascade');
            $table->foreignId('major_id')->constrained('majors', 'id')->onDelete('cascade');
            $table->foreignId('grade_id')->constrained('grades', 'id')->onDelete('cascade');
            $table->foreignId('expertise_id')->constrained('expertises', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
