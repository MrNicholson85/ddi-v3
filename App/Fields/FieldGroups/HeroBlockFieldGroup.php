<?php

namespace DPS\App\Fields\FieldGroups;

use DPS\App\Fields\FieldGroups\RegisterFieldGroups;
use WordPlate\Acf\Fields\Accordion;
use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Select;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\TrueFalse;

/**
 * Class HeroBlockFieldGroup
 *
 * @package MC\App\Fields\PageBuilderFieldGroup
 */
class HeroBlockFieldGroup extends RegisterFieldGroups
{
    /**
     * Register Field Group via Wordplate
     */
    public function registerFieldGroup()
    {
        register_block_type(DPS_THEME_DIR . 'components/blocks/hero/block.json');

        register_extended_field_group([
            'title'    => __('Hero', 'dps-starter'),
            'fields'   => $this->getFields(),
            'location' => [
                Location::if('block', 'acf/hero')
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
        return apply_filters('mc/field-group/hero-block/fields', [
            Accordion::make(_('Hero Content')),
            Select::make(__('Header Type', 'dps-starter'))
                ->choices([
                    'h1' => 'Heading 1',
                    'h2' => 'Heading 2',
                    'p' => 'paragraph',
                ])
                ->defaultValue('h1')
                ->returnFormat('value'),
            Text::make(__('Hero Header', 'dps-starter')),
            Textarea::make(__('Hero Message', 'dps-starter')),
            Accordion::make(__('Image Settings')),
            Image::make('Hero Image'),
            TrueFalse::make(__('Overlay', 'dps-starter'))
                ->defaultValue(false)
                ->stylisedUi()
        ]);
    }
}
