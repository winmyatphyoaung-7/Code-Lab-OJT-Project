<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert(['name' => 'Javascript','created_at' => Carbon::now() ,'updated_at' => Carbon::now()]);
        Category::insert(['name' => 'PHP','created_at' => Carbon::now() ,'updated_at' => Carbon::now()]);
        Category::insert(['name' => 'Laravel','created_at' => Carbon::now() ,'updated_at' => Carbon::now()]);
        Category::insert(['name' => 'Node Js','created_at' => Carbon::now() ,'updated_at' => Carbon::now()]);
        Category::insert(['name' => 'React Js','created_at' => Carbon::now() ,'updated_at' => Carbon::now()]);
        Category::insert(['name' => 'Vue Js','created_at' => Carbon::now() ,'updated_at' => Carbon::now()]);
        Category::insert(['name' => 'Bootstrap','created_at' => Carbon::now() ,'updated_at' => Carbon::now()]);
        Category::insert(['name' => 'Tailwind','created_at' => Carbon::now() ,'updated_at' => Carbon::now()]);
        Category::insert(['name' => 'Python','created_at' => Carbon::now() ,'updated_at' => Carbon::now()]);
        Category::insert(['name' => 'C#','created_at' => Carbon::now() ,'updated_at' => Carbon::now()]);
        Category::insert(['name' => 'Java','created_at' => Carbon::now() ,'updated_at' => Carbon::now()]);


    }
}
