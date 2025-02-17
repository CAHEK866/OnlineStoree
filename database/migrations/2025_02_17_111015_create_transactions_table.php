<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('order_price');
            $table->timestamp('time_order');
            $table->foreignId('user_id')->constrained('users');
            $table->string('address')->nullable();
        });

        DB::statement("SELECT setval('transactions_id_seq', 2)");
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
