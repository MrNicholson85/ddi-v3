<?php

namespace DPS\App\Fields\Layouts;

use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\WysiwygEditor;
use WordPlate\Acf\Fields\Textarea;

/**
 * Class ContentArea
 *
 * @package DPS\App\Fields\Layouts
 */
class ContentArea extends Layouts
{
    /**
     * Defines fields for this layout.
     *
     * @return object
     */
    public function fields()
    {
        return apply_filters(
            'mc/layout/content-area',
            Layout::make(__('Content Area', 'dps-starter'))
                ->layout('block')
                ->fields([
                    $this->contentTab(),
                    Textarea::make(__('Headline', 'dps-starter'))
                        ->rows(2),
                    WysiwygEditor::make(__('Content', 'dps-starter'))
                        ->mediaUpload(false)
                ])
        );
    }
}
