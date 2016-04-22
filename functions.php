<?php
// Edit as required
function tnatheme_globals() {
    global $pre_path;
    global $pre_crumbs;
    if (substr($_SERVER['REMOTE_ADDR'], 0, 3) === '10.') {
        $pre_path = '';
        $pre_crumbs = array(
            'Fighting talk: First World War telecommunications' => '/first-world-war/telecommunications-in-war/'
        );
    } else {
        $pre_crumbs = array(
            'First World War' => '/first-world-war/',
            'Fighting talk: First World War telecommunications' => '/first-world-war/telecommunications-in-war/'
        );
        $pre_path = '';
    }
}
// For live environment
tnatheme_globals();
function dequeue_parent_style() {
    wp_dequeue_style('tna-styles');
    wp_deregister_style('tna-styles');
}
add_action( 'wp_enqueue_scripts', 'dequeue_parent_style', 9999 );
add_action( 'wp_head', 'dequeue_parent_style', 9999 );
// Enqueue styles & scripts
function tna_child_styles() {
    wp_register_style( 'tna-parent-styles', get_template_directory_uri() . '/css/base-sass.css.min', array(), EDD_VERSION, 'all' );
    wp_register_style( 'tna-child-styles', get_stylesheet_directory_uri() . '/css/style.css', array(), '0.1', 'all' );
    wp_register_style( 'tna-child-styles', get_stylesheet_directory_uri() . '/css/style.css', array(), '0.1', 'all' );
    wp_deregister_script('jquery');
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js', '1.6.1', true);
    wp_register_script('jquerylazyload', get_stylesheet_directory_uri().'/js/jquery.lazyload.min.js', '', '1.9.3', true);
    wp_register_script('long-form', get_stylesheet_directory_uri(). '/js/long-form.js','','1.1', true);
    wp_enqueue_script( 'jquery' );
    wp_enqueue_style( 'tna-parent-styles' );
    wp_enqueue_style( 'tna-child-styles' );
    wp_enqueue_script( 'jquerylazyload');
    wp_enqueue_script( 'long-form' );
}
add_action( 'wp_enqueue_scripts', 'tna_child_styles' );
function admin_style() {
    wp_enqueue_style( 'admin-tna-child-styles', get_stylesheet_directory_uri() . '/css/admin-css.css', array(), '0.1', 'all' );
}
add_action( 'admin_print_styles', 'admin_style' );
// Hooks your functions into the correct filters
function image_align() {
    // check user permissions
    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
        return;
    }
    // check if WYSIWYG is enabled
    if ( 'true' == get_user_option( 'rich_editing' ) ) {
        add_filter( 'mce_external_plugins', 'my_add_tinymce_plugin' );
        add_filter( 'mce_buttons', 'my_register_mce_button' );
    }
}
add_action('admin_head', 'image_align');
// Declare script for new button
function my_add_tinymce_plugin( $plugin_array ) {
    $plugin_array['image_align'] = make_path_relative().'/wp-content/themes/tna-base-long-form/js/mce-button.js';
    return $plugin_array;
}
// Register new button in the editor
function my_register_mce_button( $buttons ) {
    array_push( $buttons, 'image_align' );
    return $buttons;
}

/* Removes Soursesets */
add_filter( 'wp_get_attachment_image_attributes', function( $attr )
{
    /*if( isset( $attr['sizes'] ) )
        unset( $attr['sizes'] );*/
    if( isset( $attr['srcset'] ) )
        unset( $attr['srcset'] );
    return $attr;
}, PHP_INT_MAX );
// Override the calculated image sizes
add_filter( 'wp_calculate_image_sizes', '__return_false',  PHP_INT_MAX );
// Override the calculated image sources
add_filter( 'wp_calculate_image_srcset', '__return_false', PHP_INT_MAX );
// Remove the reponsive stuff from the content
remove_filter( 'the_content', 'wp_make_content_images_responsive' );
/* END Removes Soursesets */
/* preg_replace_callback for Lazy Loader */
function filter_lazyload($content) {
    return preg_replace_callback('/(<\s*img[^>]+)(src\s*=\s*"[^"]+")([^>]+>)/i', 'preg_lazyload', $content);
}
add_filter('the_content', 'filter_lazyload');
/* END preg_replace_callback for Lazy Loader */
/* Filter function for Lazy Load */
function preg_lazyload($img_match) {
    $img_replace = $img_match[1] . 'src="' . get_stylesheet_directory_uri() . '/images/grey.gif" data-original' . substr($img_match[2], 3) . $img_match[3];
    $img_replace = preg_replace('/class\s*=\s*"/i', 'class="lazy ', $img_replace);
    $img_replace .= '<noscript>' . $img_match[0] . '</noscript>';
    return $img_replace;
}
/* END Filter function for Lazy Load */
/* Removes in-line width and height attributes from any DOM element */
/*function remove_width_attribute( $html ) {
        $html = preg_replace( '/(width|height)=("|\')\d*(|px)("|\')\s/', "", $html );
        return $html;
}
add_filter( 'the_content', 'remove_width_attribute', 10 );*/

 /* END Removes in-line width and height attributes from any DOM element */

function img_responsive($content){
    return str_replace('<img class="','<img class="img-responsive ',$content);
}
add_filter('the_content','img_responsive');
/* END Adds a class to every image element */
/* Removes in-line width and height attributes from any DOM element */

/* END Removes in-line width and height attributes from any DOM element */


add_action( 'after_setup_theme', 'wpse_74735_replace_wp_caption_shortcode' );
function wpse_74735_replace_wp_caption_shortcode() {
    remove_shortcode( 'caption', 'img_caption_shortcode' );
    remove_shortcode( 'wp_caption', 'img_caption_shortcode' );
    add_shortcode( 'caption', 'wpse_74735_caption_shortcode' );
    add_shortcode( 'wp_caption', 'wpse_74735_caption_shortcode' );
}

function wpse_74735_caption_shortcode( $attr, $content = NULL )
{
    $caption = img_caption_shortcode( $attr, $content );
    $caption = str_replace( 'class="wp-caption', 'class="wp-caption img-responsive', $caption );
    return $caption;
}


/* Change the name of posts */
function post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Long Form Sections';
    $submenu['edit.php'][5][0] = 'Sections';
    $submenu['edit.php'][10][0] = 'Add Sections';
    $submenu['edit.php'][16][0] = 'Section Tags';
    echo '';
}
add_action( 'admin_menu', 'post_label' );
/* Adding Menu Order to Posts*/
function menu_order()
{
    add_post_type_support( 'post', 'page-attributes' );
}
add_action( 'admin_init', 'menu_order' );
/* END Adding Menu Order to Posts*/

