<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'username' => 'admin',
            'fullname' => 'Admin',
            'phone'    => '0774864621',
            'password' => bcrypt('adminn'),
            'role'     => 'admin'
        ]);
        Admin::create([
            'username' => 'sales',
            'fullname' => 'Sales',
            'phone'    => '0774864621',
            'password' => bcrypt('adminn'),
            'role'     => 'sales'
        ]);
        Admin::create([
            'username' => 'warehouse',
            'fullname' => 'Warehouse',
            'phone'    => '0774864621',
            'password' => bcrypt('adminn'),
            'role'     => 'warehouse'
        ]);
        Admin::create([
            'username' => 'shipper',
            'fullname' => 'Shipper',
            'phone'    => '0774864621',
            'password' => bcrypt('adminn'),
            'role'     => 'shipper'
        ]);
    }
}
