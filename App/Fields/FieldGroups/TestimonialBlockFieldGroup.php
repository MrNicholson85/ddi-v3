<?php

namespace DPS\App\Fields\FieldGroups;

use DPS\App\Fields\FieldGroups\RegisterFieldGroups;
use WordPlate\Acf\Fields\Accordion;
use WordPlate\Acf\Fields\ColorPicker;
use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Image;

/**
 * Class CarouselBlockFieldGroup
 *
 * @package DPS\App\Fields\PageBuilderFieldGroup
 */
class TestimonialBlockFieldGroup extends RegisterFieldGroups
{
    /**
     * Register Field Group via Wordplate
     */
    public function registerFieldGroup()
    {
        register_block_type(DPS_THEME_DIR . 'components/blocks/testimonial/block.json');

        register_extended_field_group([
            'title'    => __('MC Testimonial', 'dps-starter'),
            'fields'   => $this->getFields(),
            'location' => [
                Location::if('block', 'acf/testimonial')
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
        return apply_filters('mc/field-group/testimonial/fields', [
            Image::make('Image'),
            Accordion::make(_('Color Setting')),
            ColorPicker::make(_('Background Color')),
            ColorPicker::make(_('Text Color'))
        ]);
    }
}
