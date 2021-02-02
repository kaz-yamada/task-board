<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labels')->insert(
            ['color' => "red"],
            ['color' => "yellow"],
            ['color' => "green"],
            ['color' => "blue"],
            ['color' => "indigo"],
            ['color' => "purple"],
            ['color' => "gray"],
            ['color' => "pink"]
        );
    }
}
