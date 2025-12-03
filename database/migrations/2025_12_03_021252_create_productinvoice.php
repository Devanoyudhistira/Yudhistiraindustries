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
        Schema::create('productinvoice', function (Blueprint $table) {
            $table->uuid("id")->primary();
             $table->foreignId('product_id')
                ->constrained(table: 'products', column: 'id')
                ->onDelete('cascade');
             $table->foreignId('buyer_id')
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
        Schema::dropIfExists('productinvoice');
    }
};
