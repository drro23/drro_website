<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database categories seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        
        Category::create([
            'label' => "Développement Web", 
            "isProjectCategory" => true,
            "secondary_label" => null
            ]);
        Category::create([
            'label' => "Développement mobile", 
            "isProjectCategory" => true,
            "secondary_label" => null
            ]);
    }
}
