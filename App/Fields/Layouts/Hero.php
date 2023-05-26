<?php

namespace DPS\App\Fields\Layouts;

use WordPlate\Acf\Fields\Link;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Select;
use WordPlate\Acf\Fields\WysiwygEditor;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\ColorPicker;
use WordPlate\Acf\Fields\TrueFalse;

/**
 * Class Hero
 *
 * @package DPS\App\Fields\Layouts
 */
class Hero extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'mc/layout/hero',
            Layout::make(__('Hero', 'dps-starter'))
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    Textarea::make(__('Headline', 'dps-starter'))
                        ->rows(2),
                    WysiwygEditor::make(__('Content', 'dps-starter'))
                        ->mediaUpload(false),
                    Link::make(__('Button', 'dps-starter'))
                        ->returnFormat('array'),
                    $this->optionsTab(),
                    Group::make(__('Background', 'dps-starter'))
                        ->layout('block')
                        ->fields([
                            Image::make(__('Image', 'dps-starter'))
                                ->previewSize('thumbnail'),
                            ColorPicker::make(__('Color', 'dps-starter'))
                                ->wrapper([
                                    'width' => '50'
                                ]),
                            TrueFalse::make(__('Background Overlay', 'dps-starter'), 'overlay')
                                ->stylisedUi()
                                ->wrapper([
                                    'width' => '50'
                                ]),
                            Select::make(__('Repeat', 'dps-starter'))
                                ->choices([
                                    'no-repeat' => __('No Repeat', 'dps-starter'),
                                    'repeat'    => __('Repeat', 'dps-starter'),
                                    'repeat-x'  => __('Repeat (X)', 'dps-starter'),
                                    'repeat-y'  => __('Repeat (Y)', 'dps-starter'),
                                ])
                                ->defaultValue('no-repeat')
                                ->returnFormat('value')
                                ->wrapper([
                                    'width' => '33.33'
                                ]),
                            Select::make(__('Position', 'dps-starter'))
                                ->choices([
                                    'left top'      => __('Left / Top', 'dps-starter'),
                                    'left center'   => __('Left / Center', 'dps-starter'),
                                    'left bottom'   => __('Left / Bottom', 'dps-starter'),
                                    'right top'     => __('Right / Top', 'dps-starter'),
                                    'right center'  => __('Right / Center', 'dps-starter'),
                                    'right bottom'  => __('Right / Bottom', 'dps-starter'),
                                    'center top'    => __('Center / Top', 'dps-starter'),
                                    'center center' => __('Center / Center', 'dps-starter'),
                                    'center bottom' => __('Center / Bottom', 'dps-starter'),
                                ])
                                ->defaultValue('center center')
                                ->returnFormat('value')
                                ->wrapper([
                                    'width' => '33.33'
                                ]),
                            Select::make(__('Size', 'dps-starter'))
                                ->choices([
                                    'auto auto' => __('Auto', 'dps-starter'),
                                    'cover'     => __('Cover', 'dps-starter'),
                                    'contain'   => __('Contain', 'dps-starter'),
                                    'inherit'   => __('Inherit', 'dps-starter'),
                                ])
                                ->defaultValue('cover')
                                ->returnFormat('value')
                                ->wrapper([
                                    'width' => '33.33'
                                ]),
                        ])
                ])
        );
    }
}
