<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KhachThue;
use App\Models\PhongTro;
use Faker\Factory as Faker;

class KhachThueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('vi_VN'); // Use Vietnamese locale for Faker
        $phongTroIds = PhongTro::pluck('id')->toArray();

        if (empty($phongTroIds)) {
            $this->command->info('Không có phòng trọ nào để gán cho khách thuê. Hãy tạo phòng trọ trước.');
            return;
        }

        for ($i = 0; $i < 20; $i++) { // Create 20 sample tenants
            KhachThue::create([
                'ho_ten' => $faker->name,
                'sdt' => $faker->unique()->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'dia_chi_thuong_tru' => $faker->address,
                'ngay_sinh' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'gioi_tinh' => $faker->randomElement(['Nam', 'Nữ', 'Khác']),
                'so_cmnd_cccd' => $faker->unique()->numerify('##############'), // 12-14 digits
                'phong_tro_id' => $faker->randomElement($phongTroIds),
            ]);
        }
    }
}
