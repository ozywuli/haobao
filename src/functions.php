<?php




/**
 * Enqueue scripts and styles.
 *
 * @since haobao 1.0
 */
function haobao_scripts() {

    // Load our main stylesheet.
    wp_enqueue_style( 'haobao-style', get_stylesheet_uri() );

    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), 'false', true );


}
add_action( 'wp_enqueue_scripts', 'haobao_scripts' );





// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function haobao_wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}
add_action('init', 'haobao_wp_pagination'); // Add our HTML5 Pagination



// Custom Excerpts
function haobao_wp_index( $length ) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function haobao_wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function haobao_wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}




// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
  'primary' => __( 'Primary Menu',      'haobao' ),
  'social'  => __( 'Social Links Menu', 'haobao' )
) );

/**
 * Register widget area.
 *
 * @since haobao 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function haobao_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Widget Area', 'haobao' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Add widgets here to appear in your sidebar.', 'haobao' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'haobao_widgets_init' );





?>