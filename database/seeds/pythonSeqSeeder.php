<?php
use App\pythonSeq;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pythonSeqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #composer dump-autoload setelah ganti config seed
        #php artisan db:seed --class=pythonSeqSeeder
    	
        pythonSeq::create(['idseq' => 100001, 'info' => '']);
    }
}
