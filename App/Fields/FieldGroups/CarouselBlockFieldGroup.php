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
 * Class CarouselBlockFieldGroup
 *
 * @package DPS\App\Fields\PageBuilderFieldGroup
 */
class CarouselBlockFieldGroup extends RegisterFieldGroups
{
    /**
     * Register Field Group via Wordplate
     */
    public function registerFieldGroup()
    {
        register_block_type(DPS_THEME_DIR . 'components/blocks/carousel/block.json');

        register_extended_field_group([
            'title'    => __('DPS Carousel', 'dps-starter'),
            'fields'   => $this->getFields(),
            'location' => [
                Location::if('block', 'acf/carousel')
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
        return apply_filters('dps/field-group/carousel-block/fields', [
            Repeater::make('Carousel')
                ->fields([
                    Accordion::make('Slide'),
                    Image::make('Image'),
                    Textarea::make('Caption')
                        ->rows(2),
                ])
                ->min(1)
                ->buttonLabel('Add Slide')
                ->layout('block'),
            Accordion::make('Block Settings'),
            Common::marginGroup()
        ]);
    }
}
