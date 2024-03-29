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
        Schema::create('reponses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreignId('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->boolean('confirmed')->nullable()->default(false);
            $table->longText('queston');
            $table->longText('reponse')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reponses');
    }
};
