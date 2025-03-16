<?php

namespace Stdevs\Housekeeper\Updates;

use Stdevs\Housekeeper\Models\Category;
use October\Rain\Database\Updates\Seeder;

class SeedCategoriesTable extends Seeder
{

    public function run()
    {
        Category::create([
            'name' => trans('stdevs.housekeeper::lang.models.category.uncategorized'),
            'slug' => 'uncategorized',
        ]);
    }
}
