<?php

/**
 * Hero Block Template.
 *
 * @param    array        $block      The block settings and attributes.
 * @param    string       $content    The block inner HTML (empty).
 * @param    bool         $is_preview True during AJAX preview.
 * @param    (int|string) $post_id    The post ID this block is saved to.
 */

use DPS\App\Fields\Util;
use DPS\App\Media;
use DPS\App\Fields\ACF;

$heading_type = get_field('header_type');
$title = get_field('hero_header') ?: 'Hero Title';
$copy = get_field('hero_message') ?: 'Hero Message';
$image = get_field('hero_image');
$overlay = get_field('overlay');
$overlay_class = '';
$bg_styles = '';

if ($overlay == true) {
	$overlay_class = 'has-overlay';
}

if (!empty($image)) {
	$bg_styles = 'style="background-image: url(' . $image['url'] . ');"';
} else {
	$bg_styles = 'style="background-color: #fff;"';
}

$wrapper_attributes = get_block_wrapper_attributes(
	[
		'class' => $overlay_class,
	]
);


// Create id attribute allowing for custom "anchor" value.
$id = 'hero-' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = ['dps-hero'];
?>
<div <?php echo $wrapper_attributes; ?> <?php echo $bg_styles ?>>
	<?php
	if (!empty($title)) {
		printf(
			'<%1$s>%2$s</%1$s>',
			$heading_type,
			$title
		);
	}

	if (!empty($copy)) {
		printf(
			'<p class="wp-block-acf-hero__text">%1$s</p>',
			$copy
		);
	}
	?>
</div>