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
        Schema::create('hoa_dons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phong_id')->constrained('phong_tros');
            $table->foreignId('khach_id')->constrained('khach_thues');
            $table->integer('thang');
            $table->integer('nam');
            $table->decimal('tien_phong', 15, 2);
            $table->decimal('tien_dien', 15, 2);
            $table->decimal('tien_nuoc', 15, 2);
            $table->decimal('tien_dich_vu', 15, 2);
            $table->string('trang_thai'); // 'Đã thanh toán' hoặc 'Chưa thanh toán'
            $table->date('ngay_thanh_toan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoa_dons');
    }
};
