<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Sầm Văn Mạnh',
                'email' => 'manhsvps38793@gmail.com',
                'phone' => 1234567890,
                'password' => '$2y$12$P.R4kw36nowvxpj51QH7vOww7xcIJzvM87e4huoSNWiOgtVQllxMy',
                'role' => 'admin',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Phạm Ngọc Cường',
                'email' => 'cuong@gmail.com',
                'phone' => 1234567880,
                'password' => '$2y$12$W358z6KBewm8BJ8geK0X7.vstUCaoitXHEdLB.74YwIceAU8d7JoW',
                'role' => 'user',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            )
           
        ));
        
        
    }
}