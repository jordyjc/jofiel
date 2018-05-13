<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array
        (
            [
                'name' => 'Super Heroes',
                'slug' => 'super heroes',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                Et maxime, reiciendis ducimus hic rem consequatur ipsam laborum possimus 
                cum totam minus optio, accusantium quod.',
                'color' => '#440022'

            ],

            [
                'name' => 'Geek',
                'slug' => 'geek',
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.' ,
                'color' => '#440022'
            ]
        );

        Category::insert($data);
    }
}