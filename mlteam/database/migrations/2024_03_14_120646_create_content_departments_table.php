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
        Schema::create('content_departments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('departments')->onDelete('cascade'); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->foreignId('send_id')->constrained('sends')->onDelete('cascade'); 
            $table->foreignId('birthday_template_id')->constrained('birthday_templates')->onDelete('cascade'); 
            $table->foreignId('master_class_id')->constrained('master_classes')->onDelete('cascade'); 
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade'); 
            $table->foreignId('content_organisation_id')->constrained('content_organisations')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_departments');
    }
};
