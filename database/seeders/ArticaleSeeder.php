<?php

namespace Database\Seeders;

use App\Models\Articale;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articales = [
            ['title' => "articale1", "image" => "imge1.png", 'content' => "aaaaaaaaa", "category_id" => Category::all()->unique()->random()->id],
            ['title' => "articale2", "image" => "imge2.png", 'content' => "bbbbbbbbb", "category_id" => Category::all()->unique()->random()->id],
            ['title' => "articale3", "image" => "imge3.png", 'content' => "ccccccccc", "category_id" => Category::all()->unique()->random()->id],
            ['title' => "articale4", "image" => "imge4.png", 'content' => "ddddddddd", "category_id" => Category::all()->unique()->random()->id],
        ];
        DB::table('articales')->delete();
        foreach ($articales as $articale) {
            Articale::create([
                'title' => $articale['title'],
                "image" => $articale['image'],
                'content' => $articale['content'],
                "category_id" => $articale['category_id']
            ]);
        }
    }
}
