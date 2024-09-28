<?php
// Enqueue Styles and Scripts
function recipe_blog_enqueue_styles() {
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    wp_enqueue_style('theme-style', get_stylesheet_uri());
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'recipe_blog_enqueue_styles');

// Theme Setup
function theme_setup() {
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'menu-1' => __('Primary Menu', 'recipe-blog-theme'),
        'menu-2' => __('Secondary Menu', 'recipe-blog-theme'),
    ));
}
add_action('after_setup_theme', 'theme_setup');

// Register Custom Post Type for Recipes
function create_recipe_post_type() {
    $labels = array(
        'name'                  => _x('Recipes', 'Post type general name', 'recipe-blog-theme'),
        'singular_name'         => _x('Recipe', 'Post type singular name', 'recipe-blog-theme'),
        'menu_name'             => _x('Recipes', 'Admin Menu text', 'recipe-blog-theme'),
        'name_admin_bar'        => _x('Recipe', 'Add New on Toolbar', 'recipe-blog-theme'),
        'add_new'               => __('Add New', 'recipe-blog-theme'),
        'add_new_item'          => __('Add New Recipe', 'recipe-blog-theme'),
        'new_item'              => __('New Recipe', 'recipe-blog-theme'),
        'edit_item'             => __('Edit Recipe', 'recipe-blog-theme'),
        'view_item'             => __('View Recipe', 'recipe-blog-theme'),
        'all_items'             => __('All Recipes', 'recipe-blog-theme'),
        'search_items'          => __('Search Recipes', 'recipe-blog-theme'),
        'parent_item_colon'     => __('Parent Recipes:', 'recipe-blog-theme'),
        'not_found'             => __('No recipes found.', 'recipe-blog-theme'),
        'not_found_in_trash'    => __('No recipes found in Trash.', 'recipe-blog-theme'),
        'featured_image'        => _x('Recipe Featured Image', 'Overrides the “Featured Image”.', 'recipe-blog-theme'),
        'set_featured_image'    => _x('Set featured image', 'Overrides the “Set featured image”.', 'recipe-blog-theme'),
        'remove_featured_image' => _x('Remove featured image', 'Overrides the “Remove featured image”.', 'recipe-blog-theme'),
        'use_featured_image'    => _x('Use as featured image', 'Overrides the “Use as featured image”.', 'recipe-blog-theme'),
        'archives'              => _x('Recipe archives', 'The post type archive label used in nav menus.', 'recipe-blog-theme'),
        'insert_into_item'      => _x('Insert into recipe', 'Overrides the “Insert into post”/”Insert into page” phrase.', 'recipe-blog-theme'),
        'uploaded_to_this_item' => _x('Uploaded to this recipe', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase.', 'recipe-blog-theme'),
        'filter_items_list'     => _x('Filter recipes list', 'Screen reader text for the filter links heading.', 'recipe-blog-theme'),
        'items_list_navigation' => _x('Recipes list navigation', 'Screen reader text for the pagination heading.', 'recipe-blog-theme'),
        'items_list'            => _x('Recipes list', 'Screen reader text for the items list heading.', 'recipe-blog-theme'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'recipe'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('recipe', $args);
}
add_action('init', 'create_recipe_post_type');

// Register Taxonomy for Recipe Categories
function create_recipe_taxonomies() {
    register_taxonomy('recipe_category', 'recipe', array(
        'labels' => array(
            'name' => 'Categories',
            'add_new_item' => 'Add New Category',
            'new_item_name' => 'New Category'
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'create_recipe_taxonomies');

// Theme Customization
function recipe_blog_customize_register($wp_customize) {
    // Logo Section
    $wp_customize->add_section('recipe_blog_logo_section', array(
        'title'    => __('Logo', 'recipe-blog-theme'),
        'priority' => 30,
    ));
    $wp_customize->add_setting('recipe_blog_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'recipe_blog_logo_control', array(
        'label'    => __('Upload Logo', 'recipe-blog-theme'),
        'section'  => 'recipe_blog_logo_section',
        'settings' => 'recipe_blog_logo',
    )));

    // Site Description
    $wp_customize->add_setting('recipe_blog_description', array(
        'default' => get_bloginfo('description'),
    ));
    $wp_customize->add_control('recipe_blog_description_control', array(
        'label'    => __('Site Description', 'recipe-blog-theme'),
        'section'  => 'recipe_blog_logo_section',
        'settings' => 'recipe_blog_description',
        'type'     => 'text',
    ));

    // Color Scheme Section
    $wp_customize->add_section('recipe_blog_color_section', array(
        'title'    => __('Color Scheme', 'recipe-blog-theme'),
        'priority' => 31,
    ));
    $wp_customize->add_setting('recipe_blog_primary_color', array(
        'default' => '#007bff', // Default Bootstrap primary color
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'recipe_blog_primary_color_control', array(
        'label'    => __('Primary Color', 'recipe-blog-theme'),
        'section'  => 'recipe_blog_color_section',
        'settings' => 'recipe_blog_primary_color',
    )));
}
add_action('customize_register', 'recipe_blog_customize_register');

// Custom Meta Box for Recipe Details
function recipe_custom_meta_box() {
    add_meta_box('recipe_meta', 'Recipe Details', 'recipe_meta_box_callback', 'recipe', 'normal', 'high');
}
add_action('add_meta_boxes', 'recipe_custom_meta_box');

function recipe_meta_box_callback($post) {
    // Get the existing metadata for ingredients and preparation steps
    $ingredients = get_post_meta($post->ID, 'ingredients', true);
    $steps = get_post_meta($post->ID, 'preparation_steps', true);

    ?>
    <p>
        <label for="ingredients">Ingredients</label>
        <?php
        // Using wp_editor for ingredients
        wp_editor($ingredients, 'ingredients', array(
            'textarea_name' => 'ingredients', // Ensures the name attribute is correct
            'textarea_rows' => 5, // Set a fixed height for the editor
        ));
        ?>
    </p>
    <p>
        <label for="preparation_steps">Preparation Steps</label>
        <?php
        // Using wp_editor for preparation steps
        wp_editor($steps, 'preparation_steps', array(
            'textarea_name' => 'preparation_steps', // Ensures the name attribute is correct
            'textarea_rows' => 5, // Set a fixed height for the editor
        ));
        ?>
    </p>
    <?php
}

function save_recipe_meta($post_id) {
    // Check if the ingredients are set in the POST data and sanitize it
    if (isset($_POST['ingredients'])) {
        // Use wp_kses_post to allow valid HTML tags for rich text fields
        update_post_meta($post_id, 'ingredients', wp_kses_post($_POST['ingredients']));
    }
    // Check if the preparation steps are set in the POST data and sanitize it
    if (isset($_POST['preparation_steps'])) {
        // Use wp_kses_post to allow valid HTML tags for rich text fields
        update_post_meta($post_id, 'preparation_steps', wp_kses_post($_POST['preparation_steps']));
    }
}
add_action('save_post', 'save_recipe_meta');

?>
