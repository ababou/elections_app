<?php
// database/migrations/2025_10_17_000004_create_results_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();

            $table->foreignId('office_id')
                  ->constrained('offices')
                  ->onDelete('cascade');

            $table->foreignId('party_id')
                  ->constrained('parties')
                  ->onDelete('cascade');

         

            $table->unsignedInteger('votes')->default(0);

            $table->timestamps();

            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
