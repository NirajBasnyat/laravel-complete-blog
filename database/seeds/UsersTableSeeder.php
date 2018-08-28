<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user =  App\User::create([
        	'name' => 'niraj basnet',
        	'email' =>'nirajf5@gmail.com',
        	'password' => bcrypt('password'),
        	'admin' => 1

        ]);

        $profile = App\Profile::create([

        	'user_id' => $user->id,
        	'avatar' =>'/storage/uploads/avatars/avatar.png',
        	'about' => 'about the admin',
        	'facebook' =>'facebook.com',
        	'youtube' => 'youtube.com'
        ]);
    }
}
