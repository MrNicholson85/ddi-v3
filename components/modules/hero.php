<?php

/**
 * ACF Module: Hero
 *
 * @global $data
 */

use DPS\App\Fields\ACF;
use DPS\App\Fields\Util;

$headline = ACF::getField('headline', $data);
$content  = ACF::getField('content', $data);
$button   = ACF::getField('button', $data);
$overlay  = ACF::getField('background_overlay', $data);
$has_full_width = ACF::getField('background_has_full_width', $data);
?>

<div class="module hero relative <?php echo $has_full_width ? 'ddi_container_full' : 'ddi_container'; ?>" <?php echo Util::getInlineBackgroundStyles($data); ?>>
    <?php if ($headline || $content || $button) : ?>
        <div class="module__content uk-container w-[350px] md:w-[450px] lg:w-[550px] grid z-10 text-center relative text-white h-[100%] justify-center content-center">
            <?php
            if ($headline) {
                echo '<div class="module__heading -translate-x-[250px] pb-8">';
                echo nl2br(Util::getHTML(
                    $headline,
                    'h1',
                    ['class' => 'module__title hdg hdg--1']
                ));
                echo '</div>';
            }
            ?>
            <?php if ($content) {
                echo '<div class="module__body -translate-x-[250px] text-xl">';
                echo apply_filters('the_content', $content);
                echo '</div>';
            } ?>
            <?php if ($button) {
                echo '<div class="module__link -translate-x-[250px]">';
                printf(
                    '<a class="flex mx-auto justify-center w-[200px] bg-blue-900 p-4 text-center" href="%2$s" target="%3$s">%1$s</a>',
                    $button['title'],
                    $button['url'],
                    $button['target']
                );
                echo '</div>';
            } ?>
        </div>
    <?php endif; ?>
    <?php if ($overlay) : ?>
        <div class="w-[100%] z-0 top-0 h-[100%] absolute bg-black opacity-30"></div>
    <?php endif; ?>
</div>