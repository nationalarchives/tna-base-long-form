<?php
// Edit as required
function tnatheme_globals() {
    global $pre_path;
    global $pre_crumbs;
    if (substr($_SERVER['REMOTE_ADDR'], 0, 3) === '10.') {
        $pre_path = '';
        $pre_crumbs = array(
            'Commercial opportunities' => '/'
        );
    } else {
        $pre_crumbs = array(
            'About us' => '/about/',
            'Commercial opportunities' => '/about/commercial-opportunities/'
        );
        $pre_path = '/about/commercial-opportunities';
    }
}
// For live environment
// tnatheme_globals();
function dequeue_parent_style() {
    wp_dequeue_style('tna-styles');
    wp_deregister_style('tna-styles');
}
add_action( 'wp_enqueue_scripts', 'dequeue_parent_style', 9999 );
add_action( 'wp_head', 'dequeue_parent_style', 9999 );
// Enqueue styles
function tna_child_styles() {
    wp_register_style( 'tna-parent-styles', get_template_directory_uri() . '/css/base-sass.css.min', array(), EDD_VERSION, 'all' );
    wp_register_style( 'tna-child-styles', get_stylesheet_directory_uri() . '/css/style.css', array(), '0.1', 'all' );
    wp_register_script('long-form', get_stylesheet_directory_uri(). '/js/long-form.js','','1.1', true);
    wp_enqueue_style( 'tna-parent-styles' );
    wp_enqueue_style( 'tna-child-styles' );
    wp_enqueue_script( 'long-form' );
}
add_action( 'wp_enqueue_scripts', 'tna_child_styles' );


function insert_image_with_caption($html, $id, $caption, $title, $align, $url, $size, $alt) {
    $src  = wp_get_attachment_image_src( $id, $size, false );
    $html5 = "<figure>";
    $html5 .= "<img src='$src[0]' alt='$alt' class='img-responsive full-width' />";
    if ($caption) {
        $html5 .= "<figcaption class='wp-caption-text'>$caption</figcaption>";
    }
    $html5 .= "</figure>";
    return $html5;
}
add_filter( 'image_send_to_editor', 'insert_image_with_caption', 10, 9 );