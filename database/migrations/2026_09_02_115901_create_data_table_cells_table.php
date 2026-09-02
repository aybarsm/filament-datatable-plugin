<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('data_table_cells', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_table_id');
            $table->unsignedBigInteger('pos_x');
            $table->unsignedBigInteger('pos_y');
            $table->json('options')->nullable();
            $table->timestamps();
            $table->unique(['data_table_id', 'pos_x', 'pos_y'], 'data_table_cells_un1');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_table_cells');
    }
};
