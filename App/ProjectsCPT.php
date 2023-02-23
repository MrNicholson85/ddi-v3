<?php

namespace DPS\App;

use DPS\App\Interfaces\WordPressHooks;

/**
 * Class Custom Post Types
 *
 * @package DPS\App
 */
class ProjectsCPT implements WordPressHooks
{
    /**
     * Add class hooks.
     */
    public function addHooks()
    {
        add_action('init', [$this, 'projects'], 0);
    }

    public function projects()
    {

        $labels = array(
            'name'                  => _x('Projects', 'Post Type General Name', 'dps-starter'),
            'singular_name'         => _x('Post Type', 'Post Type Singular Name', 'dps-starter'),
            'menu_name'             => __('Projects', 'dps-starter'),
            'name_admin_bar'        => __('Projects', 'dps-starter'),
            'archives'              => __('Item Archives', 'dps-starter'),
            'attributes'            => __('Item Attributes', 'dps-starter'),
            'parent_item_colon'     => __('Parent Item:', 'dps-starter'),
            'all_items'             => __('All Items', 'dps-starter'),
            'add_new_item'          => __('Add New Item', 'dps-starter'),
            'add_new'               => __('Add New Project', 'dps-starter'),
            'new_item'              => __('New Item', 'dps-starter'),
            'edit_item'             => __('Edit Item', 'dps-starter'),
            'update_item'           => __('Update Item', 'dps-starter'),
            'view_item'             => __('View Item', 'dps-starter'),
            'view_items'            => __('View Items', 'dps-starter'),
            'search_items'          => __('Search Item', 'dps-starter'),
            'not_found'             => __('Not found', 'dps-starter'),
            'not_found_in_trash'    => __('Not found in Trash', 'dps-starter'),
            'featured_image'        => __('Featured Image', 'dps-starter'),
            'set_featured_image'    => __('Set featured image', 'dps-starter'),
            'remove_featured_image' => __('Remove featured image', 'dps-starter'),
            'use_featured_image'    => __('Use as featured image', 'dps-starter'),
            'insert_into_item'      => __('Insert into item', 'dps-starter'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'dps-starter'),
            'items_list'            => __('Items list', 'dps-starter'),
            'items_list_navigation' => __('Items list navigation', 'dps-starter'),
            'filter_items_list'     => __('Filter items list', 'dps-starter'),
        );
        $args = array(
            'label'                 => __('Post Type', 'dps-starter'),
            'description'           => __('Post Type Description', 'dps-starter'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor'),
            'taxonomies'            => array('category', 'post_tag'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type('projects', $args);
    }
}
