<?php 

namespace Stdevs\Housekeeper\Models;

/**
 * Settings Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Settings extends \System\Models\SettingModel
{
    public $settingsCode = 'stdevs_housekeeper_settings';

    public $settingsFields = 'fields.yaml';
}