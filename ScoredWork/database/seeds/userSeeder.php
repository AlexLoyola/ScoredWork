<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Factory;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = factory(App\User::class)->create();
        /*DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'admin' => ('0'),
            'points' => random_int();
        ]);
        */

        /*factory(App\User::class, 50)->create()->each(function ($u) {
        $u->posts()->save(factory(App\Post::class)->make());*/
    });
    }
}

