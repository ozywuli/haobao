<?php

/**
 * Add Photographer Name and URL fields to media uploader
 *
 * @param $form_fields array, fields to include in attachment form
 * @param $post object, attachment record in database
 * @return $form_fields, modified form fields
 */
 
function be_attachment_field_credit( $form_fields, $post ) {
    $form_fields['be-photographer-name'] = array(
        'label' => 'Photographer Name',
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'be_photographer_name', true ),
        'helps' => 'If provided, photo credit will be displayed',
    );

    $form_fields['be-photographer-url'] = array(
        'label' => 'Photographer URL',
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'be_photographer_url', true ),
        'helps' => 'Add Photographer URL',
    );

    return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'be_attachment_field_credit', 10, 2 );

/**
 * Save values of Photographer Name and URL in media uploader
 *
 * @param $post array, the post data for database
 * @param $attachment array, attachment fields from $_POST form
 * @return $post array, modified post data
 */

function be_attachment_field_credit_save( $post, $attachment ) {
    if( isset( $attachment['be-photographer-name'] ) )
        update_post_meta( $post['ID'], 'be_photographer_name', $attachment['be-photographer-name'] );

    if( isset( $attachment['be-photographer-url'] ) )
update_post_meta( $post['ID'], 'be_photographer_url', esc_url( $attachment['be-photographer-url'] ) );

    return $post;
}

add_filter( 'attachment_fields_to_save', 'be_attachment_field_credit_save', 10, 2 );




// Related posts
add_filter( 'rp4wp_append_content', '__return_false' );


add_image_size( 'related-posts', 400, 240 );


function rp4wp_example_my_thumbnail_size( $thumb_size ) {
    return 'related-posts';
}
add_filter( 'rp4wp_thumbnail_size', 'rp4wp_example_my_thumbnail_size' );



// Add featured image upload to post editor
add_theme_support( 'post-thumbnails' );


// Display only posts in search results
function searchFilter($query) {
    if ($query -> is_search) {
        $query -> set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts', 'searchFilter');


/**
 * Enqueue scripts and styles.
 *
 * @since haobao 1.0
 */
function haobao_scripts() {

    // Load our main stylesheet.
    wp_enqueue_style( 'haobao-style', get_stylesheet_uri() );

    wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/assets/js/vendor/fitvids.js', array( 'jquery' ));

    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array( 'fitvids', 'jquery' ));


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
  'pages' => __( 'Pages Menu', 'haobao'),
  'category' => __( 'Category Menu', 'haobao' ),
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



/*
 * Add social media options to author profile
 */

function add_to_author_profile( $contactmethods ) {
       
        $contactmethods['rss_url'] = 'RSS URL';
        $contactmethods['google_profile'] = 'Google Profile URL';
        $contactmethods['twitter_profile'] = 'Twitter Profile URL';
        $contactmethods['facebook_profile'] = 'Facebook Profile URL';
        $contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
        $contactmethods['tumblr_profile'] = 'Tumblr Profile URL';
       
        return $contactmethods;
}
add_filter( 'user_contactmethods', 'add_to_author_profile', 10, 1);


?>
<?php
/* Adding Image Upload Fields */
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) 
{ 
?>

    <h3>Profile Images</h3>

    <style type="text/css">
        .fh-profile-upload-options th,
        .fh-profile-upload-options td,
        .fh-profile-upload-options input {
            vertical-align: top;
        }

        .user-preview-image {
            display: block;
            height: auto;
            width: 300px;
        }

    </style>

    <table class="form-table fh-profile-upload-options">
        <tr>
            <th>
                <label for="image">Main Profile Image</label>
            </th>

            <td>
                <img class="user-preview-image" src="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>">

                <input type="text" name="image" id="image" value="<?php echo esc_attr( get_the_author_meta( 'image', $user->ID ) ); ?>" class="regular-text" />
                <input type='button' class="button-primary" value="Upload Image" id="uploadimage"/><br />

                <span class="description">Please upload an image for your profile.</span>
            </td>
        </tr>

        <tr>
            <th>
                <label for="image">Sidebar Profile Image</label>
            </th>

            <td>
                <img class="user-preview-image" src="<?php echo esc_attr( get_the_author_meta( 'sidebarimage', $user->ID ) ); ?>">

                <input type="text" name="sidebarimage" id="sidebarimage" value="<?php echo esc_attr( get_the_author_meta( 'sidebarimage', $user->ID ) ); ?>" class="regular-text" />
                <input type='button' class="button-primary" value="Upload Image" id="sidebarUploadimage"/><br />

                <span class="description">Please upload an image for the sidebar.</span>
            </td>
        </tr>
    </table>

    <script type="text/javascript">
        (function( $ ) {
            $( '#uploadimage' ).on( 'click', function() {
                tb_show('test', 'media-upload.php?type=image&TB_iframe=1');

                window.send_to_editor = function( html ) 
                {
                    imgurl = $( 'img',html ).attr( 'src' );
                    $( '#image' ).val(imgurl);
                    tb_remove();
                }

                return false;
            });

            $( 'input#sidebarUploadimage' ).on('click', function() {
                tb_show('', 'media-upload.php?type=image&TB_iframe=true');

                window.send_to_editor = function( html ) 
                {
                    imgurl = $( 'img', html ).attr( 'src' );
                    $( '#sidebarimage' ).val(imgurl);
                    tb_remove();
                }

                return false;
            });
        })(jQuery);
    </script>
<?php 
}


add_action( 'admin_enqueue_scripts', 'enqueue_admin' );

function enqueue_admin()
{
    wp_enqueue_script( 'thickbox' );
    wp_enqueue_style('thickbox');

    wp_enqueue_script('media-upload');
}


add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        {
            return false;
        }

    update_user_meta( $user_id, 'image', $_POST[ 'image' ] );
    update_user_meta( $user_id, 'sidebarimage', $_POST[ 'sidebarimage' ] );
}

?>
<?php
add_action('wp_footer', 'add_googleanalytics');
function add_googleanalytics() { ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46611617-9', 'auto');
  ga('send', 'pageview');

</script>
<?php } ?>