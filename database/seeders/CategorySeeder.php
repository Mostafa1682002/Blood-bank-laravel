<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['الوقايه', 'الامراض'];
        DB::table('categories')->delete();
        foreach ($categories as $categorie) {
            Category::create([
                'name' => $categorie
            ]);
        }
    }
}
