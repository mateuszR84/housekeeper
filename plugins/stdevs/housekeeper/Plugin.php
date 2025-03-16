<?php

namespace Stdevs\Housekeeper;

use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Housekeeper',
            'description' => 'No description provided yet...',
            'author' => 'Stdevs',
            'icon' => 'icon-cubes'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        //
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        //
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return [
            'Stdevs\Housekeeper\Components\ItemsList' => 'itemsList',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'stdevs.housekeeper.some_permission' => [
                'tab' => 'Housekeeper',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return [
            'housekeeper' => [
                'label' => 'Housekeeper',
                'url' => Backend::url('stdevs/housekeeper/items'),
                'icon' => 'icon-cubes',
                'permissions' => ['stdevs.housekeeper.*'],
                'order' => 500,

                'sideMenu' => [
                    'new_item' => [
                        'label'       => 'stdevs.housekeeper::lang.navigation.new_item',
                        'icon'        => 'icon-plus',
                        'url'         => Backend::url('stdevs/housekeeper/items/create'),
                    ],
                    'items' => [
                        'label'       => 'stdevs.housekeeper::lang.navigation.items',
                        'icon'        => 'icon-cubes',
                        'url'         => Backend::url('stdevs/housekeeper/items'),
                    ],
                    'categories' => [
                        'label'       => 'stdevs.housekeeper::lang.navigation.categories',
                        'icon'        => 'icon-list',
                        'url'         => Backend::url('stdevs/housekeeper/categories'),
                    ]
                ]
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label' => 'stdevs.housekeeper::lang.settings.label',
                'description' => 'stdevs.housekeeper::lang.settings.description',
                'category' => 'stdevs.housekeeper::lang.settings.category',
                'icon' => 'icon-settings',
                'class' => \Stdevs\Housekeeper\Models\Settings::class,
            ]
        ];
    }
}
