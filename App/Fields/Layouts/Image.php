<?php

namespace DPS\App\Fields\Layouts;

use WordPlate\Acf\Fields\Image as WPImage;
use WordPlate\Acf\Fields\Layout;

/**
 * Class Image
 *
 * @package DPS\App\Fields\Layouts
 */
class Image extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'mc/layout/image',
            Layout::make('Image')
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    WPImage::make('Image')
                        ->returnFormat('array')
                ])
        );
    }
}
