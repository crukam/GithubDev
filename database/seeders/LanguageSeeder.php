<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = ['PHP','HTML','Javascript','Css','C','C++','Node js','java','Cobol','Pascal','Assembly','Xml'];

        foreach($languages as $language){
            DB::table('languages')->insert(['name'=> $language]);
        }
    }
}
