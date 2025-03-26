<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Добавляем столбец admin в таблицу users
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('admin')->nullable()->default(false);  // admin как булево значение, по умолчанию null
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('admin');
        });
    }
};
