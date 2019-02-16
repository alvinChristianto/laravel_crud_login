<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     DB::table('users')->delete();
        $json = File::get("database/seederfile/users.json");
        $data = json_decode($json);
        foreach($data as $obj)
        { User::create(array(
        	'id' => $obj -> id,
        	'role_id' => $obj -> role_id,
        	'username' => $obj -> username,
        	'name' => $obj -> name,
        	'email' => $obj -> email,
            #'password' => Hash::make('admin1')]);
        	'password' => Hash::make($obj -> password),
			'remember_token' => $obj -> remember_token,
        	'created_at' => $obj -> created_at,
			'updated_at' => $obj -> updated_at
        ));
		}
    }
}
