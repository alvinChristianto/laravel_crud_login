<?php

use App\roleModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('roles')->truncate();

        roleModel::create(['id' => 1, 'namaRole' => 'Pengguna']);
        roleModel::create(['id' => 2, 'namaRole' => 'Admin']);
    }
}
