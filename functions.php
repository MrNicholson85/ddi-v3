<?php

/**
 * Functions and definitions
 *
 * @package DPS
 */

use DPS\App\Core\Init;
use DPS\App\Setup;
use DPS\App\ProjectsCPT;
use DPS\App\Scripts;
use DPS\App\Media;
use DPS\App\Shortcodes;
use DPS\App\Fields\ACF;
use DPS\App\Fields\Options;
use DPS\App\Fields\Modules;
use DPS\App\Fields\FieldGroups\SiteOptionsFieldGroup;
use DPS\App\Fields\FieldGroups\PageBuilderFieldGroup;
use DPS\App\Fields\FieldGroups\CarouselBlockFieldGroup;
use DPS\App\Fields\FieldGroups\FiftyFiftyFieldGroup;
use DPS\App\Fields\FieldGroups\TextFieldGroup;
use DPS\App\Fields\FieldGroups\ProjectsBlockFieldGroup;
use DPS\App\Fields\FieldGroups\HeroBlockFieldGroup;
use DPS\App\Blocks;

use DPS\App\Blocks\RegisterBlocks;
use DPS\App\Fields\FieldGroups\TestimonialBlockFieldGroup;

/**
 * Define Theme Version
 * Define Theme directories
 */
define('THEME_VERSION', '3.1.1');
define('DPS_THEME_DIR', trailingslashit(get_template_directory()));
define('DPS_THEME_PATH_URL', trailingslashit(get_template_directory_uri()));

// Require Autoloader
require_once DPS_THEME_DIR . 'vendor/autoload.php';

/**
 * Theme Setup
 */
add_action('after_setup_theme', function () {

    (new Init())
        ->add(new Setup())
        //->add(new Blocks())
        ->add(new Scripts())
        ->add(new ProjectsCPT())
        ->add(new Media())
        ->add(new Shortcodes())
        ->add(new ACF())
        ->add(new Options())
        ->add(new Modules())
        ->add(new SiteOptionsFieldGroup())
        ->add(new PageBuilderFieldGroup())
        ->add(new RegisterBlocks())
        ->add(new CarouselBlockFieldGroup())
        ->add(new ProjectsBlockFieldGroup())
        ->add(new FiftyFiftyFieldGroup())
        ->add(new TextFieldGroup())
        ->add(new TestimonialBlockFieldGroup())
        ->add(new HeroBlockFieldGroup())
        ->initialize();

    // Translation setup
    load_theme_textdomain('dps-starter', DPS_THEME_DIR . '/languages');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Add automatic feed links in header
    add_theme_support('automatic-feed-links');

    // Add Post Thumbnail Image sizes and support
    add_theme_support('post-thumbnails');

    //Add Gutenburg Theme Support
    add_theme_support('editor-styles');
    add_editor_style('style-editor.scss');

    // Switch default core markup to output valid HTML5.
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ]);
});
