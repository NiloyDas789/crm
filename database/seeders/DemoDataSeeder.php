<?php

namespace Database\Seeders;

use App\Models\Dashboard\Category;
use App\Models\Dashboard\Priority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createPriorities();
        $this->createCategories();
    }

    private function createCategories()
    {
        $category=['category1','category2','category3'];

        for ($i=0; $i < count($category) ; $i++) {
            Category::create([
                'name'      => $category[$i],
            ]);
        }
    }

    private function createPriorities()
    {
        $priority=['High','Medium','Low'];

        for ($i=0; $i < count($priority) ; $i++) {
            Priority::create([
                'name'      => $priority[$i],
            ]);
        }
    }
}
