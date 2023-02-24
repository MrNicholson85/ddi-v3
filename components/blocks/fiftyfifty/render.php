<?php

/**
 * ACF Module: Fifty Fifty
 *
 * @global $data
 */

use DPS\App\Fields\ACF;
use DPS\App\Media;
use DPS\App\Fields\Util;

$data = $block['data'];
$carousel = ACF::getRowsLayout('carousel', $data);

?>

<div <?php echo get_block_wrapper_attributes(); ?>>
	<?php
	foreach ($carousel as $slides) {
		$sliderImage = Util::getImageHTML(Media::getAttachmentByID($slides['image']));

		printf(
			'%1$s',
			$sliderImage,
		);
	}
	?>
</div>