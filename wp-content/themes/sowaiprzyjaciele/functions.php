<?php
include_once(get_template_directory() . '/inc/current-post-submenu.php');

function sip_load_textdomain(){
    load_theme_textdomain('sowaiprzyjaciele', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'sip_load_textdomain');

function sip_widgets_init() {
    register_sidebar(array(
        'name' => __('Top widget panel', 'sowaiprzyjaciele'),
        'description' => __('Widgets in this area show up on the top of the page.', 'sowaiprzyjaciele'),
        'id' => 'top',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action( 'widgets_init', 'sip_widgets_init' );

function sip_menus_init() {
    register_nav_menu('main', __('Main menu', 'sowaiprzyjaciele'));
}
add_action('init', 'sip_menus_init');

function sip_post_types_init() {
    register_post_type(
        'with-submenu-panel',
        array(
            'label' => __('Posts with submenu panel', 'sowaiprzyjaciele'),
            'labels' => array(
                'singular_name' => __('Post with submenu panel', 'sowaiprzyjaciele')
            ),
            'public' => true,
            'menu_icon' => 'dashicons-menu',
        )
    );
}
add_action('init', 'sip_post_types_init');

function sip_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() ) {
        return $title;
    }

    // Add the site name.
    $title .= get_bloginfo( 'name', 'display' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title = "$title $sep $site_description";
    }

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 ) {
        $title = "$title $sep " . sprintf( __( 'Page %s', 'sowaiprzyjaciele'), max( $paged, $page ) );
    }

    return $title;
}
add_filter('wp_title', 'sip_wp_title', 10, 2);


function sip_get_value(array $array, $key) {
    return $array[$key];
}

function sip_get_uri($subpath) {
    return get_template_directory_uri() . '/' . $subpath;
}

