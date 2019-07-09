<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');
 
        foreach (range(1, 15) as $loop) {
            $data['title'] = $faker->text(50);
            $data['slug'] = str_slug($faker->text(50));
            $data['content'] = $faker->text(500);
            if ($loop % 2 == 0) {
                $data['category_id'] = 2;
                $data['banner_original'] = 'B9SXIcqkG4Qyede8psPuldWDfM3YfAGG84c2kjAa07072019.jpeg';
            }elseif($loop % 3 == 0){
                $data['category_id'] = 3;
                $data['banner_original'] = 'zASzrcrXiOSRCrfCOD05Qacg9NAePzMm2iwwJst307072019';
            }elseif ($loop % 5 == 0) {
                $data['category_id'] = 5;
                $data['banner_original'] = 'B9SXIcqkG4Qyede8psPuldWDfM3YfAGG84c2kjAa07072019.jpeg';
            }else{
                $data['category_id'] = 1;
                $data['banner_original'] = 'zASzrcrXiOSRCrfCOD05Qacg9NAePzMm2iwwJst307072019';
            }

            Article::create($data);
        }          
    }
}
