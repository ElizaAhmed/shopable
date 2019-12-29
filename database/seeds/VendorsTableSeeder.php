<?php

use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendors = array(
            'Ahold Delhaize',
            'Albertsons',
            'Aldi',
            'Amazon',
            'Apple Stores',
            'Auchan',
            'AutoZone',
            'Bed Bath & Beyond',
            'Best Buy',
            'Ceconomy',
            'Cencosud',
            'China Resources Vanguard',
            'Conad',
            'Coop',
            'Costco',
            'Dairy Farm International Holdings',
            'IKEA',
            'John Lewis',
            'Kering',
            'Kingfisher plc',
            'Tesco',
            'The Home Depot',
            'Walmart',
            'Wesfarmers',
            'Whole Foods Market',

        );

        //clean the table 
        DB::table('product_vendors')->delete();

        foreach ($vendors as $vendor) {
            DB::table('product_vendors')->insert(
                [
                    'name' => $vendor
                ]
            );
        }
    }
}
