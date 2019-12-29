<?php

use Illuminate\Database\Seeder;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = array(
            'Baby',
            'Beauty',
            'Books',
            'CDs ',
            'Classical Music',
            'Clothing',
            'Computers & Accessories',
            'Digital Music',
            'DIY & Tools',
            'DVD & Blu-ray',
            'Electronics & Photo',
            'Fashion',
            'Garden & Outdoors',
            'Gift Cards',
            'Grocery',
            'Handmade',
            'Health & Personal Care',
            'Home & Business Services',
            'Home & Kitchen',
            'Industrial & Scientific',
            'Jewellery',
            'Kindle Store',
            'Large Appliances',
            'Lighting',
            'Luggage',
            'Luxury Beauty',
            'Musical Instruments & DJ',
            'PC & Video Games',
            'Pet Supplies',
            'Shoes & Bags',
            'Software',
            'Sports & Outdoors',
            'Stationery & Office Supplies',
            'Toys & Games',
            'VHS',
            'Watches',
        );

        //clean the table 
        DB::table('product_types')->delete();

        foreach($types as $type) {
            DB::table('product_types')->insert(
                [
                    'name' => $type
                ]
            );
        }
    }
}
