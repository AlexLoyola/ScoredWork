<?php

use Illuminate\Database\Seeder;
use App\level;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(userSeeder::class);
        for ($i =1;$i<50;$i++){
	       level::create([
	    	'level' 	=>	$i,
	    	'points'	=>	(sqrt(0.5*$i))*$i*15
			]);
		}


    }
    public function firstseeds(){
	    DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'admin' => '0',
            'points' => rand(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'admin' => '0',
            'points' => rand(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'admin' => '0',
            'points' => rand(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        DB::table('events')->insert([
            'formal' => 1,
            'hourTime' => 1,
            'buttonText' => 'Participa',
            'title' => 'Titulo evento 1',
            'points' => 15,
            'description' => 'Lorem ipsum lor sit amet. Este es el evento que debería tener todo en 1 y el resto de la descripción el evento va aquí, pidiendo a los chavos de su participación, detallando el lugar y la hora indicada para ele ventoa demás de información adicional y demás',
            'image' => 'img.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        DB::table('event-participation')->insert([
            'formal' => 1,
            'puntual' => 1,
            'percentage' => 4,
            'points'=>25,
            'confirmation'=>1,
            'user_id' => 1,
            'event_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
         DB::table('event-participation')->insert([
            'formal' => 1,
            'puntual' => 1,
            'percentage' => 3,
            'points'=>20,
            'confirmation'=>1,
            'user_id' => 2,
            'event_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
         DB::table('event-participation')->insert([
            'formal' => 1,
            'puntual' => 1,
            'percentage' => 2,
            'points'=>15,
            'confirmation'=>0,
            'user_id' => 3,
            'event_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
    }
}
