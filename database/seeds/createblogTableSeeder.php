<?php

use Illuminate\Database\Seeder;
use App\blog;

class createblogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('createblog')->delete();
        $json = File::get("database/seederfile/createblog.json");
        $data = json_decode($json);
        foreach($data as $obj)
        { blog::create(array(
        	'id' => $obj -> id,
        	'judul' => $obj -> judul,
        	'subjudul' => $obj -> subjudul,
        	'createby' => $obj -> createby,
        	'para1' => $obj -> para1,
        	'para2' => $obj -> para2,
			'para3' => $obj -> para3,
        	'created_at' => $obj -> created_at,
			'updated_at' => $obj -> updated_at
        ));
		}
    }
}
