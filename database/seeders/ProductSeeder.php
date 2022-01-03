<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$products =[
    		[
    			'name'=> 'Apple MacBook Pro',
    			'details'=> 'MacBook Pro 512GB',
    			'description'=> '    16-core Neural Engine
    			14-inch Liquid Retina XDR display
    			Three Thunderbolt 4 ports, HDMI port, SDXC card slot, MagSafe 3 port
    			Magic Keyboard with Touch ID
    			Force Touch trackpad
    			67W USB-C Power Adapter',
    			'brand'=> 'Apple',
    			'price'=> 2499,
    			'shipping_cost'=> 25,
    			'image_path'=> 'storage/product.png',
    		],
    		[
    			'name'=> 'Samsung Galaxy Book',
    			'details'=> '512GB,14inches',
    			'description'=> 'Three Thunderbolt 4 ports, HDMI port, SDXC card slot, MagSafe 3 port
    			Magic Keyboard with Touch ID
    			Force Touch trackpad
    			67W USB-C Power Adapter',
    			'brand'=> 'Samsung',
    			'price'=> 2200,
    			'shipping_cost'=> 20,
    			'image_path'=> 'storage/product2.png',
    		]
    	];

    	foreach($products as $key => $value){
    		Product::create($value);
    	}
    }
}
