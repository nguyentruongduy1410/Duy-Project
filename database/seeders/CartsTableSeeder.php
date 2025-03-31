<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CartsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('carts')->delete();
        
        \DB::table('carts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'product_id' => 29,
                'quantity' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => '2025-03-28 03:02:04',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'product_id' => 11,
                'quantity' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => '2025-03-27 15:19:31',
            )
        ));
        
        
    }
}