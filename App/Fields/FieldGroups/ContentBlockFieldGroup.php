<?php

namespace DPS\App\Fields\FieldGroups;

use DPS\App\Fields\FieldGroups\RegisterFieldGroups;
use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Textarea;

/**
 * Class ContentBlockFieldGroup
 *
 * @package DPS\App\Fields\PageBuilderFieldGroup
 */
class ContentBlockFieldGroup extends RegisterFieldGroups
{
    /**
     * Register Field Group via Wordplate
     */
    public function registerFieldGroup()
    {
        register_block_type(DPS_THEME_DIR . 'components/blocks/contentBlock/block.json');

        register_extended_field_group([
            'title'    => __('DPS Content', 'dps-starter'),
            'fields'   => $this->getFields(),
            'location' => [
                Location::if('block', 'acf/content')
            ],
            'style' => 'default'
        ]);
    }

    /**
     * Register the fields that will be available to this Field Group.
     *
     * @return array
     */
    public function getFields()
    {
        return apply_filters('dps/field-group/contentBlock/fields', [
            Text::make(__('Title', 'dps-starter')),
            Textarea::make(__('Copy', 'dps-starter'))
        ]);
    }
}
