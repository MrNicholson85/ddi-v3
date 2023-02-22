<?php

namespace DPS\App\Fields\Layouts;

use DPS\App\Fields\ACF;
use WordPlate\Acf\Fields\Tab;

/**
 * Class Layouts
 *
 * @package DPS\App\Fields\Layouts
 */
abstract class Layouts
{
    /**
     * Defines fields for layout.
     *
     * @return object
     */
    abstract public function fields();

    /**
     * Creates Content Tab Field.
     *
     * @return object
     */
    public function contentTab()
    {
        return Tab::make(__('Content', 'dps-starter'), 'content-tab')
            ->placement('left');
    }

    /**
     * Creates Options Tab Field.
     *
     * @return object
     */
    public function optionsTab()
    {
        return Tab::make(__('Options', 'dps-starter'), 'options-tab')
            ->placement('left');
    }
}
