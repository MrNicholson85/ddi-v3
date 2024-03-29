<?php

/**
 * ACF Module: Carousel
 *
 * @global $data
 */

use DPS\App\Fields\ACF;
use DPS\App\Media;
use DPS\App\Fields\Util;


$items = ACF::getRowsLayout('carousel_items', $data);

if (!$items) {
    return;
}

$animation_type = ACF::getField('carousel-animation-type', $data, 'slide');
$show_arrows_nav = ACF::getField('show-carousel-arrows-nav', $data, 'true');
$show_indicators = ACF::getField('show-carousel-indicators', $data, 'false');
?>

<div class="module carousel">
    <div class="uk-container uk-container-large">
        <div ukgrid>
            <div class="uk-slideshow uk-width-full uk-position-relative uk-visible-toggle uk-light" tabindex="-1" data-animation="<?php echo esc_attr($animation_type) ?>">
                <ul class="uk-slideshow-items">
                    <?php
                    foreach ($items as $item) {
                        printf(
                            '<li>
                                %1$s
                            </li>',
                            Util::getImageHTML(Media::getAttachmentByID($item['image']), 'full', ['uk-cover' => true])
                        );
                    }
                    ?>
                </ul>

                <?php if ($show_arrows_nav !== 'false') : ?>
                    <a class="uk-slidenav-large uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                    <a class="uk-slidenav-large uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                <?php endif; ?>

                <?php if ($show_indicators === 'true') : ?>
                    <div class="uk-flex uk-flex-center uk-margin">
                        <ul class="uk-dotnav">
                            <?php
                            foreach ($items as $key => $item) {
                                printf(
                                    '<li uk-slideshow-item="%1$s">
                                        <a href="#">%2$s %1$s</a>
                                    </li>',
                                    $key,
                                    __('Item', 'dps-starter')
                                );
                            }
                            ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>