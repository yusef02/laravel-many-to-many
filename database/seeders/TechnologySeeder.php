<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = config('technologies');
        foreach ($technologies as $technology) {
            $add_tech = new Technology();
            $add_tech->technology = $technology;
            $add_tech->save();
        }
    }
}
