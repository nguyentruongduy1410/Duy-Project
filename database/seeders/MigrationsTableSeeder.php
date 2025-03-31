<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'migration' => '0001_01_01_000000_create_users_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 4,
                'migration' => '2025_03_21_052317_create_orders_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 5,
                'migration' => '2025_03_21_053454_create_categories_table',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 6,
                'migration' => '2025_03_21_053905_create_products_table',
                'batch' => 1,
            ),
            4 => 
            array (
                'id' => 7,
                'migration' => '2025_03_21_054440_create_order_details_table',
                'batch' => 1,
            ),
            5 => 
            array (
                'id' => 8,
                'migration' => '2025_03_26_172531_create_carts_table',
                'batch' => 1,
            ),
            6 => 
            array (
                'id' => 9,
                'migration' => '2025_03_28_165722_create_carts_table',
                'batch' => 0,
            ),
            7 => 
            array (
                'id' => 10,
                'migration' => '2025_03_28_165722_create_categories_table',
                'batch' => 0,
            ),
            8 => 
            array (
                'id' => 11,
                'migration' => '2025_03_28_165722_create_order_details_table',
                'batch' => 0,
            ),
            9 => 
            array (
                'id' => 12,
                'migration' => '2025_03_28_165722_create_orders_table',
                'batch' => 0,
            ),
            10 => 
            array (
                'id' => 13,
                'migration' => '2025_03_28_165722_create_password_reset_tokens_table',
                'batch' => 0,
            ),
            11 => 
            array (
                'id' => 14,
                'migration' => '2025_03_28_165722_create_products_table',
                'batch' => 0,
            ),
            12 => 
            array (
                'id' => 15,
                'migration' => '2025_03_28_165722_create_sessions_table',
                'batch' => 0,
            ),
            13 => 
            array (
                'id' => 16,
                'migration' => '2025_03_28_165722_create_users_table',
                'batch' => 0,
            ),
            14 => 
            array (
                'id' => 17,
                'migration' => '2025_03_28_165725_add_foreign_keys_to_carts_table',
                'batch' => 0,
            ),
            15 => 
            array (
                'id' => 18,
                'migration' => '2025_03_28_165725_add_foreign_keys_to_categories_table',
                'batch' => 0,
            ),
            16 => 
            array (
                'id' => 19,
                'migration' => '2025_03_28_165725_add_foreign_keys_to_order_details_table',
                'batch' => 0,
            ),
            17 => 
            array (
                'id' => 20,
                'migration' => '2025_03_28_165725_add_foreign_keys_to_orders_table',
                'batch' => 0,
            ),
            18 => 
            array (
                'id' => 21,
                'migration' => '2025_03_28_165725_add_foreign_keys_to_products_table',
                'batch' => 0,
            ),
        ));
        
        
    }
}