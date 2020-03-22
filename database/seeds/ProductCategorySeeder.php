<?php

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProductCategories::class, 50)->create()->each(function($pCategory) {
            // Даст нам хотя бы один продукт в категории, чтоб она была не пустой.
            $pCategory->Products()->save(factory(\App\Product::class)->make());
        });

    }
}
