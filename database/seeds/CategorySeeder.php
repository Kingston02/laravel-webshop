<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Creating categories from CategorySeeder');

        DB::table('categories')->insert(['name' => 'CPU', 'image_url' => 'https://images-na.ssl-images-amazon.com/images/I/51bcECs0GcL._AC_SX679_.jpg']);
        DB::table('categories')->insert(['name' => 'Beeldschermen', 'image_url' => 'https://s3-storage.textopus.nl/wp-content/uploads/2017/01/17182817/dell-s2718d-436x277.jpg']);
        DB::table('categories')->insert(['name' => 'Kabels', 'image_url' => 'https://image.freepik.com/vrije-vector/kabel-draad-computer-video-audio-usb-hdmi-netwerk-en-elektrische-conectors-en-stekkers-vector-set-geisoleerd_53562-6444.jpg']);
        DB::table('categories')->insert(['name' => 'Routers', 'image_url' => 'http://www.spectrumoffices.nl/wp-content/uploads/2019/06/what_is_mu-mimo_-_asus_rt-ac5300_thumb800.jpg']);
        DB::table('categories')->insert(['name' => 'Stoelen', 'image_url' => 'https://media.s-bol.com/qv9xAROnMYD/550x694.jpg']);
    }
}
