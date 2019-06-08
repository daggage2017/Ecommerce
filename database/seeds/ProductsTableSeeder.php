<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for ($i = 1; $i <= 30; $i++) {
            Product::create([
                'name'        =>     'Laptop' . $i,
                'slug'        =>     'Laptop-' . $i,
                'details'     =>    '13 inch TB SSD, 32 GB RAM',
                'details'     =>     [14, 15, 16][array_rand([14, 15, 16])] .' inch,' . [1, 2, 3][array_rand([1, 2, 3])] . ' TB SSD, 32 GB RAM',
                'price'       =>     rand(169999, 289999),
                'description' =>     'Lorem ipsum'. $i . ' dolor sit amet, viverra orci wisi, nunc urna lectus lacus. Morbi purus ante diam adipiscing id orci',

            ])->categories()->attach(1);
        }


        for ($i = 1; $i <= 30; $i++) {
            Product::create([
                'name'        =>     'Desktop' . $i,
                'slug'        =>     'Desktop-' . $i,
                'details'     =>     [14, 15, 16][array_rand([14, 15, 16])] .' inch,' . [1, 2, 3][array_rand([1, 2, 3])] . ' TB SSD, 32 GB RAM',
                'price'       =>     rand(169999, 289999),
                'description' =>     'Lorem ipsum'. $i . ' dolor sit amet, viverra orci wisi, nunc urna lectus lacus. Morbi purus ante diam adipiscing id orci',

            ])->categories()->attach(2);
        }




        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name'        =>     'Camera' . $i,
                'slug'        =>     'Camera-' . $i,
                'details'     =>     [14, 15, 16][array_rand([14, 15, 16])] .' inch,' . [1, 2, 3][array_rand([1, 2, 3])] . ' TB SSD, 32 GB RAM',
                'price'       =>     rand(19999, 29999),
                'description' =>     'Lorem ipsum'. $i . ' dolor sit amet, viverra orci wisi, nunc urna lectus lacus. Morbi purus ante diam adipiscing id orci',

            ])->categories()->attach(3);
        }


        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name'        =>     'Phone' . $i,
                'slug'        =>     'Phone-' . $i,
                'details'     =>     [14, 15, 16][array_rand([14, 15, 16])] .' inch,' . [1, 2, 3][array_rand([1, 2, 3])] . ' TB SSD, 32 GB RAM',
                'price'       =>     rand(29999, 49999),
                'description' =>     'Lorem ipsum'. $i . ' dolor sit amet, viverra orci wisi, nunc urna lectus lacus. Morbi purus ante diam adipiscing id orci',

            ])->categories()->attach(4);
        }


        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name'        =>     'Tablet' . $i,
                'slug'        =>     'Tablet-' . $i,
                'details'     =>     [14, 15, 16][array_rand([14, 15, 16])] .' inch,' . [1, 2, 3][array_rand([1, 2, 3])] . ' TB SSD, 32 GB RAM',
                'price'       =>     rand(59999, 99999),
                'description' =>     'Lorem ipsum '. $i . ' dolor sit amet, viverra orci wisi, nunc urna lectus lacus. Morbi purus ante diam adipiscing id orci',

            ])->categories()->attach(5);
        }

        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name'        =>     'Application' . $i,
                'slug'        =>     'Application-' . $i,
                'details'     =>     [14, 15, 16][array_rand([14, 15, 16])] .' inch,' . [1, 2, 3][array_rand([1, 2, 3])] . ' TB SSD, 32 GB RAM',
                'price'       =>     rand(249999, 349999),
                'description' =>     'Lorem ipsum'. $i . ' dolor sit amet, viverra orci wisi, nunc urna lectus lacus. Morbi purus ante diam adipiscing id orci',

            ])->categories()->attach(6);
        }









    }
}
