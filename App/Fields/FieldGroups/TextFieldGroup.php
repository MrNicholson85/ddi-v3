<?php

namespace DPS\App\Fields\FieldGroups;

use DPS\App\Fields\Common;
use DPS\App\Fields\FieldGroups\RegisterFieldGroups;
use WordPlate\Acf\Fields\Accordion;
use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Textarea;

/**
 * Class TextFieldGroup
 *
 * @package DPS\App\Fields\PageBuilderFieldGroup
 */
class TextFieldGroup extends RegisterFieldGroups
{
    /**
     * Register Field Group via Wordplate
     */
    public function registerFieldGroup()
    {
        register_block_type(DPS_THEME_DIR . 'components/blocks/example-dynamic/block.json');

        register_extended_field_group([
            'title'    => __('DPS Text', 'dps-starter'),
            'fields'   => $this->getFields(),
            'location' => [
                Location::if('block', 'acf/example-dynamic')
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
        return apply_filters('dps/field-group/example-dynamic/fields', [
            Textarea::make(__('Text Here', 'dps-starter')),
            Accordion::make('Block Settings'),
            Common::marginGroup()
        ]);
    }
}
