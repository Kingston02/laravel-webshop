<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Creating products from ProductSeeder');

        DB::table('products')->insert(['category_id' => 1, 'name' => 'Intel 7', 'image_url' => 'https://www.intel.com/content/dam/products/hero/foreground/badge-9th-gen-core-i7-1x1.png.rendition.intel.web.225.225.png', 'description' => 'Sterkste en snelste Intel 7 op de markt', 'price' => 70.99]);
        DB::table('products')->insert(['category_id' => 2, 'name' => 'Ultrawide IPS Monitor', 'image_url' => 'https://media.s-bol.com/312nNv9lnv6Q/550x332.jpg', 'description' => 'Scherpste beeldscherm op de markt', 'price' => 199]);
        DB::table('products')->insert(['category_id' => 3, 'name' => 'DrPhone Ethernetkabel CAT6', 'image_url' => 'https://drphone.nl/23255-large_default/drphone-ethernetkabel-cat6-platte-rj45-lan-netwerk-kabel-1gbps-1000-mbps-3-meter-zwart.jpg', 'description' => 'Beste kabel op dit moment voor een goede prijs', 'price' => 13.75]);
        DB::table('products')->insert(['category_id' => 4, 'name' => 'TP-Link Archer C1200', 'image_url' => 'https://image.coolblue.nl/max/500x500/products/1367038', 'description' => 'Beste router', 'price' => 150]);
        DB::table('products')->insert(['category_id' => 5, 'name' => 'Nordic Gaming Blaster RGB gamestoel', 'image_url' => 'https://www.sbsupply.nl/media/catalog/product/cache/1/image/800x/602f0fa2c1f0d1ba5e241f914e856ff9/n/o/nordic-gaming-blaster-rgb-gaming-chair-black-1.jpg', 'description' => 'Stevige stoel met een stoere uitstraling', 'price' => 349]);
    }
}