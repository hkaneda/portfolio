<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->truncate();
        DB::table('items')->insert([
            'product_name' => 'ウサギのぬいぐるみ',
            'description' => '可愛いウサギのぬいぐるみです！',
            'price' => '1200',
            'image' => 'yumekawa_animal_usagi.png',
            'stock' => '10',
            'release_date' => '2022/05/11',
            'upper_limit' => '',
        ]);


        DB::table('items')->insert([
            'product_name' => '猫のキーホルダー',
            'description' => '可愛い猫のキーホルダーです！',
            'price' => '680',
            'image' => 'toy_keyholder_rubber.png',
            'stock' => '20',
            'release_date' => '2022/05/26',
            'upper_limit' => '3',
        ]);



        DB::table('items')->insert([
            'product_name' => 'ニワトリとひよこのポストカード',
            'description' => '可愛いニワトリとひよこのポストカードです！',
            'price' => '300',
            'image' => 'niwatori_hiyoko_koushin.png',
            'stock' => '30',
            'release_date' => '2022/05/29',
            'upper_limit' => '',
        ]);


            // 'product_name' => '',
            // 'description' => '',
            // 'price' => '',
            // 'image' => '',
            // 'stock' => '',
            // 'release_date' => '',
            // 'upper_limit' => '',

            // 'product_name' => '',
            // 'description' => '',
            // 'price' => '',
            // 'image' => '',
            // 'stock' => '',
            // 'release_date' => '',
            // 'upper_limit' => '',

            // 'product_name' => '',
            // 'description' => '',
            // 'price' => '',
            // 'image' => '',
            // 'stock' => '',
            // 'release_date' => '',
            // 'upper_limit' => '',

            // 'product_name' => '',
            // 'description' => '',
            // 'price' => '',
            // 'image' => '',
            // 'stock' => '',
            // 'release_date' => '',
            // 'upper_limit' => '',

            // 'product_name' => '',
            // 'description' => '',
            // 'price' => '',
            // 'image' => '',
            // 'stock' => '',
            // 'release_date' => '',
            // 'upper_limit' => '',

            // 'product_name' => '',
            // 'description' => '',
            // 'price' => '',
            // 'image' => '',
            // 'stock' => '',
            // 'release_date' => '',
            // 'upper_limit' => '',

            // 'product_name' => '',
            // 'description' => '',
            // 'price' => '',
            // 'image' => '',
            // 'stock' => '',
            // 'release_date' => '',
            // 'upper_limit' => '',

            // 'product_name' => '',
            // 'description' => '',
            // 'price' => '',
            // 'image' => '',
            // 'stock' => '',
            // 'release_date' => '',
            // 'upper_limit' => '',

            // 'product_name' => '',
            // 'description' => '',
            // 'price' => '',
            // 'image' => '',
            // 'stock' => '',
            // 'release_date' => '',
            // 'upper_limit' => '',

            // 'product_name' => '',
            // 'description' => '',
            // 'price' => '',
            // 'image' => '',
            // 'stock' => '',
            // 'release_date' => '',
            // 'upper_limit' => '',

            // 'product_name' => '',
            // 'description' => '',
            // 'price' => '',
            // 'image' => '',
            // 'stock' => '',
            // 'release_date' => '',
            // 'upper_limit' => '',

            // 'product_name' => '',
            // 'description' => '',
            // 'price' => '',
            // 'image' => '',
            // 'stock' => '',
            // 'release_date' => '',
            // 'upper_limit' => '',

            // 'product_name' => '',
            // 'description' => '',
            // 'price' => '',
            // 'image' => '',
            // 'stock' => '',
            // 'release_date' => '',
            // 'upper_limit' => '',



    }
}
