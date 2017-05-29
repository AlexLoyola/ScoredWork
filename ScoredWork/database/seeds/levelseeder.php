<?php

use Illuminate\Database\Seeder;
use App\level
class levelseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    for ($i =1;$i<50;$i++){
	       level::create([
	    	'level' 	=>	$i,
	    	'points'	=>	(sqrt(0.5*$i))*$i*15;
			]);
		}
    }
}
