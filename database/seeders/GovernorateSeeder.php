<?php

namespace Database\Seeders;

use App\Models\Governorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $governorates = ['الدقهلية', 'كفر الشيخ ', 'الغربية', 'المنوفية', 'دمياط'];
        DB::table('governorates')->delete();
        foreach ($governorates as $governorate) {
            Governorate::create([
                'name' => $governorate
            ]);
        }
    }
}
