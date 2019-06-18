<?php

use App\District;
use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::create(['name' => 'Quận Hải Châu', 'city_id' => 1]);
        District::create(['name' => 'Quận Thanh Khê', 'city_id' => 1]);
        District::create(['name' => 'Quận Sơn Trà', 'city_id' => 1]);
        District::create(['name' => 'Quận Ngũ Hành Sơn', 'city_id' => 1]);
        District::create(['name' => 'Quận Liên Chiểu', 'city_id' => 1]);
        District::create(['name' => 'Quận Cẩm Lệ', 'city_id' => 1]);
        District::create(['name' => 'Huyện Hòa Vang', 'city_id' => 1]);
    }
}
