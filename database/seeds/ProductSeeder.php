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
        // Просто нагенерим продуктов в рандомных категориях
        factory(\App\Product::class, 50)->create();
    }
}
