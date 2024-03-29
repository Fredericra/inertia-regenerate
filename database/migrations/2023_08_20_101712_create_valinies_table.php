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
        Schema::create('valinies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->boolean('confirmed')->nullable()->default(false);
            $table->longText('question');
            $table->longText('reponse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valinies');
    }
};
