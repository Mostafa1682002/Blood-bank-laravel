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
            ['title' => "الوقاية من الأمراض", "image" => asset('/assets/images/articales/imge1.png'), 'content' => "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى", "category_id" => Category::all()->unique()->random()->id],
            ['title' => "الوقاية من الأمراض", "image" => asset('/assets/images/articales/imge2.png'), 'content' => "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى", "category_id" => Category::all()->unique()->random()->id],
            ['title' => "الوقاية من الأمراض", "image" => asset('/assets/images/articales/imge3.png'), 'content' => "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى", "category_id" => Category::all()->unique()->random()->id],
            ['title' => "الوقاية من الأمراض", "image" => asset('/assets/images/articales/imge4.png'), 'content' => "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى", "category_id" => Category::all()->unique()->random()->id],
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
