<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('data_tables', function (Blueprint $table) {
            $table->id();
            $table->morphs('owner');
            $table->string('name');
            $table->string('slug');
            $table->json('options')->nullable();
            $table->timestamps();
            $table->unique(['owner_type', 'owner_id', 'slug'], 'data_tables_un1');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_tables');
    }
};
