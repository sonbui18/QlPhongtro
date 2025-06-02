<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PhongTro;
use Faker\Factory as Faker;

class PhongTroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN');

        for ($i = 0; $i < 10; $i++) {
            PhongTro::create([
                'ten_phong' => 'Phòng ' . $faker->unique()->numerify('###'),
                'dia_chi' => $faker->streetAddress,
                'gia_thue' => $faker->numberBetween(1000000, 5000000),
                'mo_ta' => $faker->realText(100),
                'dien_tich' => $faker->numberBetween(15, 50),
                'so_luong_nguoi_o_toi_da' => $faker->numberBetween(1, 4),
                'tien_dien' => $faker->numberBetween(3000, 5000),
                'tien_nuoc' => $faker->numberBetween(15000, 30000),
                'tien_internet' => $faker->numberBetween(100000, 200000),
                'tien_rac' => $faker->numberBetween(20000, 50000),
                'trang_thai' => $faker->randomElement(['còn trống', 'đã thuê']),
            ]);
        }
    }
}
