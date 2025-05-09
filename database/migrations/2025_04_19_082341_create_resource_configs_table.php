<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resource_configs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('resource_types')->cascadeOnDelete();
            $table->json('config');
            $table->decimal('price', 10, 2);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resource_configs');
    }
};
