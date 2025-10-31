<?php

// database/migrations/2025_10_17_000001_create_schools_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('commune_id')
                  ->constrained('communes')
                  ->onDelete('cascade'); // إذا تحذفت الجماعة، تتحذف المدارس ديالها
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
