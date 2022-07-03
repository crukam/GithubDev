<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeveloperRepository;
use App\Models\Language;
use Illuminate\Support\Arr;

class DeveloperRepositoriesLanguages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developerRepo = new DeveloperRepository();
       $repositories = $developerRepo->all();
     
       foreach($repositories as $repository)
       {
        $language = Language::find(Arr::random([1,2,3]));
        $repository->languages()->attach($language);
        $language = Language::find(Arr::random([4,5,6,7]));
        $repository->languages()->attach($language);
        $language = Language::find(Arr::random([8,9,10,11]));
        $repository->languages()->attach($language);
       }
    }
}
