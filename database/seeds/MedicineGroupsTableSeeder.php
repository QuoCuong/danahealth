<?php

use Illuminate\Database\Seeder;
use App\MedicineGroup;

class MedicineGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MedicineGroup::create([
            'name' => 'Thực phẩm chức năng',
            'parent_id' => 0,
        ]);

        MedicineGroup::create([
            'name' => 'Chăm sóc cá nhân',
            'parent_id' => 0,
        ]);

        MedicineGroup::create([
            'name' => 'Chăm sóc sức khỏe',
            'parent_id' => 0,
        ]);

        MedicineGroup::create([
            'name' => 'Tủ thuốc gia đình',
            'parent_id' => 0,
        ]);

        MedicineGroup::create([
            'name' => 'Chăm sóc phụ nữ',
            'parent_id' => 0,
        ]);

        MedicineGroup::create([
            'name' => 'Sức khỏe giới tính',
            'parent_id' => 0,
        ]);

        MedicineGroup::create([
            'name' => 'Hỗ trợ xương khớp',
            'parent_id' => 1,
        ]);

        MedicineGroup::create([
            'name' => 'Vitamin tổng hợp',
            'parent_id' => 1,
        ]);

        MedicineGroup::create([
            'name' => 'Vitamin trẻ em',
            'parent_id' => 1,
        ]);

        MedicineGroup::create([
            'name' => 'Chăm sóc răng miệng',
            'parent_id' => 2,
        ]);

        MedicineGroup::create([
            'name' => 'Chăm sóc tóc',
            'parent_id' => 2,
        ]);

        MedicineGroup::create([
            'name' => 'Chăm sóc cơ thể',
            'parent_id' => 2,
        ]);

        MedicineGroup::create([
            'name' => 'Chăm sóc phụ nữ',
            'parent_id' => 2,
        ]);
    }
}
