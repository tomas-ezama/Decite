<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Matematicas',
        ]);
        Category::create([
            'name' => 'Historia',
        ]);
        Category::create([
            'name' => 'Geografia',
        ]);
        Category::create([
            'name' => 'Economia',
        ]);
        Category::create([
            'name' => 'Teoria Contable',
        ]);
        Category::create([
            'name' => 'Dibujo',
        ]);
        Category::create([
            'name' => 'Ingles',
        ]);
        Category::create([
            'name' => 'Frances',
        ]);
        Category::create([
            'name' => 'Canto',
        ]);
        Category::create([
            'name' => 'Baile',
        ]);
    
    }
}
