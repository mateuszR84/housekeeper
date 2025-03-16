<?php

namespace Stdevs\Housekeeper\Models;

use Model;

/**
 * Category Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'stdevs_housekeeper_categories';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'name' => 'required',
        'slug' => 'required|between:3,64|unique:stdevs_housekeeper_categories',
        'code' => 'nullable|unique:rainlab_blog_categories',
    ];
    
    public $belongsToMany = [
        'posts' => ['Stdevs\Housekeeper\Models\Item',
            'table' => 'stdevs_housekeeper_items_categories',
        ],
        'posts_count' => ['Stdevs\Housekeeper\Models\Item',
            'table' => 'stdevs_housekeeper_items_categories',
            'count' => true
        ]
    ];
    
    public function getItemsCountAttribute()
    {
        return optional($this->posts_count->first())->count ?? 0;
    }
}
