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
         DB::table('users')->insert([
          'name' =>'Administrador',
          'email' =>'admin@correo.net',
          'password' => bcrypt('123'),
          'created_at' => now(),
          'updated_at' => now()
    ]);


        factory(\App\User::class, 4)->create();
    }

   
}
