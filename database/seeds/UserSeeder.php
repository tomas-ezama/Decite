<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->times(50)->create();
        $users = factory(User::class)->times(50)->create();
        $totalCategories = Category::all()->count();
        foreach ($users as $user) {
            if ($user->role == 1) {
                for ($i =0; $i <= 3; $i++) {
                    $category = Category::find(rand(0, $totalCategories));
                    $user->categories()->attach($category);
                }
            }
        }
    }
}
