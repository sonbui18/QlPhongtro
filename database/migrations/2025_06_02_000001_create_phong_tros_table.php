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
        Schema::create('phong_tros', function (Blueprint $table) {
            $table->id();
            $table->string('ten_phong'); // Changed from so_phong
            $table->string('dia_chi'); // Added
            $table->decimal('gia_thue', 10, 2); // Added
            $table->text('mo_ta')->nullable(); // Added
            $table->float('dien_tich'); // Changed type from string
            $table->integer('so_luong_nguoi_o_toi_da'); // Changed from nguoi_o
            $table->decimal('tien_dien', 8, 2)->nullable(); // Added
            $table->decimal('tien_nuoc', 8, 2)->nullable(); // Added
            $table->decimal('tien_internet', 8, 2)->nullable(); // Added
            $table->decimal('tien_rac', 8, 2)->nullable(); // Added
            $table->string('trang_thai')->default('còn trống'); // Changed from tinh_trang and added default
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phong_tros');
    }
};
