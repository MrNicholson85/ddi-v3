<?php

namespace DPS\App\Fields\FieldGroups;

use DPS\App\Fields\Common;
use DPS\App\Fields\FieldGroups\RegisterFieldGroups;
use WordPlate\Acf\Fields\Accordion;
use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\PostObject;

/**
 * Class Projects
 *
 * @package DPS\App\Fields\PageBuilderFieldGroup
 */
class ProjectsBlockFieldGroup extends RegisterFieldGroups
{
    /**
     * Register Field Group via Wordplate
     */
    public function registerFieldGroup()
    {
        register_block_type(DPS_THEME_DIR . 'components/blocks/project/block.json');

        register_extended_field_group([
            'title'    => __('DPS Projects', 'dps-starter'),
            'fields'   => $this->getFields(),
            'location' => [
                Location::if('block', 'acf/project')
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
        return apply_filters('dps/field-group/project/fields', [
            PostObject::make('Projects'),
            Accordion::make('Block Settings'),
            Common::marginGroup()
        ]);
    }
}
