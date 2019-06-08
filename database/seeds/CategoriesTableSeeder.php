<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::insert([
             ['name'            => 'Laptop',  'slug'            => 'laptop'],
             ['name'            => 'Desktop',  'slug'           => 'desktop'],
             ['name'            => 'Camera',  'slug'            => 'camera'],
             ['name'            => 'Phone',  'slug'             => 'phone'],
             ['name'            => 'Tablet',  'slug'            => 'tablet'],
             ['name'           => 'Application',  'slug'       => 'application'],
        ]);
    }
}
