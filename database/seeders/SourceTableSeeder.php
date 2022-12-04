<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Source;
use Illuminate\Support\Facades\Auth;


class SourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sources = ['friends','adds','facebook','snapchat'] ;

        foreach ($sources as $source) {
         Source::create([
            'name' => $source,
            'description'=> $source . ' description ',
            'created_by'=> 1
         ]);
        }
       
    }
}
