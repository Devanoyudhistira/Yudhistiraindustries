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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->decimal("price", 15, 2);
            $table->string("productname",25);
            $table->foreignId('seller_id')
                ->constrained(table: 'users', column: 'user_id')
                ->onDelete('cascade');
            $table->string("description",200);
            $table->string("image")->default("");            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
