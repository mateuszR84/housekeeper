<?php namespace Stdevs\Housekeeper\Components;

use Cms\Classes\ComponentBase;
use Stdevs\Housekeeper\Models\Item;

/**
 * ItemsList Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class ItemsList extends ComponentBase
{
    public $items;
    
    public function componentDetails()
    {
        return [
            'name' => 'Items List Component',
            'description' => 'Display all items'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }

    public function onRun() 
    {
        $this->items = Item::get();    
    }
}
