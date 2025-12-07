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
        Schema::create('Blogger', function (Blueprint $table) {
            $table->id();
            $table->string("title",30);
            $table->text("blog");
            $table->foreignId('sender_id')
      ->constrained(table: 'users', column: 'user_id')
      ->onDelete('cascade');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogger');
    }
};
