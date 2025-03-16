<?php

namespace Stdevs\Housekeeper\Models;

use Lang;
use Model;
use Stdevs\Housekeeper\Models\Category;

/**
 * Item Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Item extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;

    /**
     * @var string table name
     */
    public $table = 'stdevs_housekeeper_items';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'name' => 'required',
        'slug'    => ['required', 'regex:/^[a-z0-9\/\:_\-\*\[\]\+\?\|]*$/i', 'unique:stdevs_housekeeper_items'],
    ];

    public $slugs = [
        'slug' => 'name'
    ];
    
    public $belongsToMany = [
        'categories' => [
            Category::class,
            'table' => 'stdevs_housekeeper_items_categories',
            'order' => 'name'
        ]
    ];

    public $attachMany = [
        'images' => \System\Models\File::class
    ];

    public function getConditionOptions(): array
    {
        return [
            'new' => Lang::get('stdevs.housekeeper::lang.models.item.conditions.new'),
            'like_new' => Lang::get('stdevs.housekeeper::lang.models.item.conditions.like_new'),
            'good' => Lang::get('stdevs.housekeeper::lang.models.item.conditions.good'),
            'fair' => Lang::get('stdevs.housekeeper::lang.models.item.conditions.fair'),
            'needs_repair' => Lang::get('stdevs.housekeeper::lang.models.item.conditions.needs_repair'),
        ];
    }

    public function getStatusOptions(): array
    {
        return [
            'for_sale' => Lang::get('stdevs.housekeeper::lang.models.item.statuses.for_sale'),
            'given_away' => Lang::get('stdevs.housekeeper::lang.models.item.statuses.given_away'),
            'sold' => Lang::get('stdevs.housekeeper::lang.models.item.statuses.sold'),
        ];
    }

    public function getPriceStatusOptions(): array
    {
        return [
            'tbd' => Lang::get('stdevs.housekeeper::lang.models.item.price_statuses.tbd'),
            'fixed' => Lang::get('stdevs.housekeeper::lang.models.item.price_statuses.fixed'),
        ];
    }

    public function getLocationOptions(): array
    {
        $options = [];

        $locations = Settings::get('locations');
        foreach ($locations as $key => $location) {
            $options[$location['slug']] = $location['name'];
        }
        return $options;
    }
}
