<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shopping_cart_id')
                ->constrained('shopping_carts')
                ->onDelete('cascade');
            $table->foreignId('product_id')
                ->constrained('products')
                ->onDelete('cascade');
            $table->integer('quantity')->unsigned();
            $table->timestamps();
        });

        DB::statement("SELECT setval('orders_id_seq', 2)");

    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
