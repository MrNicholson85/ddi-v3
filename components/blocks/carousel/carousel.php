<?php

/**
 * carousel Block Template.
 *
 * @param    array        $block      The block settings and attributes.
 * @param    string       $content    The block inner HTML (empty).
 * @param    bool         $is_preview True during AJAX preview.
 * @param    (int|string) $post_id    The post ID this block is saved to.
 */

use MC\App\Fields\Util;
use MC\App\Media;
use MC\App\Fields\ACF;

// Create id attribute allowing for custom "anchor" value.
$block_id = 'carousel-' . $block['id'];
if (!empty($block['anchor'])) {
    $block_id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'mc-carousel';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
// Load values and assign defaults.
$carousel = get_field('carousel');

do_action('mc/styles/margin', $block_id, $block);
?>
<?php if ($carousel) { ?>
    <div id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($className); ?>">
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>

            <ul class="h-[840px] uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-1@m">
                <?php foreach ($carousel as $slides) :  ?>
                    <li>
                        <img class="prose slider-image bg-cover bg-center" src="<?php echo $slides['image']['url'] ?>" width="" height="" alt="">
                        <div class="uk-position-center uk-panel">
                            <h1><?php echo $slides['caption'] ?></h1>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

        </div>
    </div>
<?php } ?>