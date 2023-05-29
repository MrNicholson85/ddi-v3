<?php

/**
 * Testimonial Block Template.
 *
 * @param    array        $block      The block settings and attributes.
 * @param    string       $content    The block inner HTML (empty).
 * @param    bool         $is_preview True during AJAX preview.
 * @param    (int|string) $post_id    The post ID this block is saved to.
 */

use DPS\App\Fields\Util;
use DPS\App\Media;
use DPS\App\Fields\ACF;

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'dps-testimonial';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$data = $block['data'];
$image            = get_Field('image');
$image_data       = Media::getAttachmentByID($image);
$background_color = get_field('background_color');
$text_color       = get_field('text_color');

$template = [
    [
        'core/paragraph',
        [
            'content' => 'Testimonial',
            'align' => 'left',
            'className'     => 'mc-testimonial__message',
        ]
    ],
    [
        'core/heading',
        [
            'level'         => 2,
            'content'       => 'Author',
            'algin'         => 'left',
            'className'     => 'mc-testimonial__title',
        ]
    ],
    [
        'core/heading',
        [
            'level'         => 6,
            'content'       => 'Role',
            'align'         => 'left',
            'className'     => 'mc-testimonial__role',
        ]
    ],
];

$allowed_blocks = array('core/heading', 'core/paragraph');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <blockquote class="testimonial-blockquote bg-slate-500">
        <InnerBlocks template="<?php echo esc_attr(wp_json_encode($template)); ?>" allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>" templatLock="all" />
    </blockquote>
    <div class="testimonial-image" style="background-image: url('<?php echo $image['url'] ?>');">

    </div>
    <style type="text/css">
        #<?php echo $id; ?> {
            background: <?php echo $background_color; ?>;
            color: <?php echo $text_color; ?>;
        }
    </style>
</div>