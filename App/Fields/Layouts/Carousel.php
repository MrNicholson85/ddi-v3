<?php

namespace DPS\App\Fields\Layouts;

use WordPlate\Acf\Fields\ButtonGroup;
use WordPlate\Acf\Fields\Image as WPImage;
use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Select;

/**
 * Class Carousel
 *
 * @package DPS\App\Fields\Layouts
 */
class Carousel extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'dps/layout/carousel',
            Layout::make(__('Carousel'), 'carousel')
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    Repeater::make(__('Carousel Items'))
                        ->layout('block')
                        ->min(1)
                        ->buttonLabel(__('Add Item'))
                        ->fields([
                            WPImage::make('Image')
                                ->returnFormat('array'),
                        ]),
                    $this->optionsTab(),
                    Select::make(__('Animation Type'), 'carousel-animation-type')
                        ->choices([
                            'fade'  => __('Fade'),
                            'pull'  => __('Pull'),
                            'push'  => __('Push'),
                            'scale' => __('Scale'),
                            'slide' => __('Slide'),
                        ])
                        ->defaultValue('slide')
                        ->returnFormat('value')
                        ->wrapper([
                            'width' => '33.33'
                        ]),
                    ButtonGroup::make(__('Enable Arrow Navigation'), 'show-carousel-arrows-nav')
                        ->choices([
                            'true'  => __('Enable'),
                            'false' => __('Disable'),
                        ])
                        ->instructions(__('Enabling will show a previous and next navigation arrow overlayed on the carousel.'))
                        ->defaultValue('true')
                        ->wrapper([
                            'width' => '33.33'
                        ]),
                    ButtonGroup::make(__('Enable Indicators'), 'show-carousel-indicators')
                        ->choices([
                            'true'  => __('Enable'),
                            'false' => __('Disable'),
                        ])
                        ->instructions(__('Enabling will show a dot navigation button group.'))
                        ->defaultValue('false')
                        ->wrapper([
                            'width' => '33.33'
                        ]),
                ])
        );
    }
}
