<?php

use App\roleModel;
use App\User;
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
        $this->call(createblogTableSeeder::class);
        ##users
        
        DB::table('users')->delete();
        
        #User::create(['id' => 'admin_1',
        #              'role_id' => '2',
        #              'username' => 'admin1',
        #              'name' => 'admin1',
        #              'email' => 'admin1@gmail.com',
        #              'password' => Hash::make('admin1')]);

        ##roles
        DB::table('roles')->delete();
        roleModel::create(['id' => 1, 'namaRole' => 'Pengguna']);
        roleModel::create(['id' => 2, 'namaRole' => 'Admin']);
    }
}
