<?php

use Illuminate\Database\Seeder;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');
 
        foreach (range(1, 5) as $loop) {
            DB::table('article_category')->insert([
                'name'      => $faker->text(10),
                'slug'       => str_slug($faker->text(10)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }        
    }
}
