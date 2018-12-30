<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
          'Alementacion',
          'Tranporte',
          'Internet',
          'Telefono',
          'Television',
          'Netflix',
          'ropa'
        ];
        foreach ($names as $name){
            $category = \App\Category::create(['name' => $name]);
        }
    }
}
