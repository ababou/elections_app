<?php
// database/migrations/2025_10_17_000002_create_offices_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('school_id')
                  ->constrained('schools')
                  ->onDelete('cascade');

            // عمود user_id باش نربط المكتب بالمستخدم المسؤول عليه
            $table->foreignId('user_id')
                  ->nullable() // تقدر تخليه nullable إذا مكتب ماعندوش مسؤول بعد
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->timestamp('submitted_at')->nullable(); // تاريخ أول إدخال
            $table->boolean('allow_edit')->default(true); // هل يسمح بالتعديل بعد الإدخال
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offices');
    }
};
