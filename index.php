<?php 
/**
 * Plugin Name:       Video Slider Plugin
 * Plugin URI:        #
 * Description:       Use this Code to insert this code to show the slider [video_slider category="Slider One"] 😉
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Abdullah Al Noman
 * Author URI:        https://m.me/abdullahsasc
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       
 * Domain Path:       
 */


// Register Custom Post Type Video
function create_video_cpt() {

	$labels = array(
		'name' => _x( 'Videos', 'Post Type General Name', 'video_slider' ),
		'singular_name' => _x( 'Video', 'Post Type Singular Name', 'video_slider' ),
		'menu_name' => _x( 'Videos', 'Admin Menu text', 'video_slider' ),
		'name_admin_bar' => _x( 'Video', 'Add New on Toolbar', 'video_slider' ),
		'archives' => __( 'Video Archives', 'video_slider' ),
		'attributes' => __( 'Video Attributes', 'video_slider' ),
		'parent_item_colon' => __( 'Parent Video:', 'video_slider' ),
		'all_items' => __( 'All Videos', 'video_slider' ),
		'add_new_item' => __( 'Add New Video', 'video_slider' ),
		'add_new' => __( 'Add New', 'video_slider' ),
		'new_item' => __( 'New Video', 'video_slider' ),
		'edit_item' => __( 'Edit Video', 'video_slider' ),
		'update_item' => __( 'Update Video', 'video_slider' ),
		'view_item' => __( 'View Video', 'video_slider' ),
		'view_items' => __( 'View Videos', 'video_slider' ),
		'search_items' => __( 'Search Video', 'video_slider' ),
		'not_found' => __( 'Not found', 'video_slider' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'video_slider' ),
		'featured_image' => __( 'Featured Image', 'video_slider' ),
		'set_featured_image' => __( 'Set featured image', 'video_slider' ),
		'remove_featured_image' => __( 'Remove featured image', 'video_slider' ),
		'use_featured_image' => __( 'Use as featured image', 'video_slider' ),
		'insert_into_item' => __( 'Insert into Video', 'video_slider' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Video', 'video_slider' ),
		'items_list' => __( 'Videos list', 'video_slider' ),
		'items_list_navigation' => __( 'Videos list navigation', 'video_slider' ),
		'filter_items_list' => __( 'Filter Videos list', 'video_slider' ),
	);
	$args = array(
		'label' => __( 'Video', 'video_slider' ),
		'description' => __( '', 'video_slider' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-video-alt2',
		'supports' => array('title'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => true,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'video_slider', $args );

}

function taxonomy_for_video_cpt() {
    $labels = array(
        'name' => _x( 'Slider Name', 'taxonomy general name' ),
        'singular_name' => _x( 'Slider Name', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search' ),
        'all_items' => __( 'All Slider' ),
        'parent_item' => __( 'Parent Slider Name' ),
        'parent_item_colon' => __( 'Parent Slider Name:' ),
        'edit_item' => __( 'Edit Slider Name' ),
        'update_item' => __( 'Update Slider Name' ),
        'add_new_item' => __( 'Add New Slider Name' ),
        'new_item_name' => __( 'New Slider Name' ),
        'menu_name' => __( 'Slider Name' ),
    );

    register_taxonomy('sliders_name',array('video_slider'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'slider_name' ),
    ));
}
add_action( 'init', 'create_video_cpt', 0 );
add_action( 'init', 'taxonomy_for_video_cpt', 0 );

/**
 * Enqueue script and style for the Video slider
 */
function enqueue_style_script_vs(){
    //CSS
    wp_enqueue_style('slick-main-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css', [], false, 'all');
    wp_enqueue_style('slick-theme-main-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css', [], false, 'all');
    wp_enqueue_style('font-awesome-css-vs', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', [], false, 'all');

    //JavaScript
    wp_enqueue_script('slick-main-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', ['jquery'], false, false);
}
add_action('wp_enqueue_scripts', 'enqueue_style_script_vs');

function main_css_vs(){
    ?>
    <style>
        .rf-wrapper{width:100%;padding-top:20px;text-align:center;position:relative;height:400px}h2{font-family:sans-serif;color:#fff}.slick-slide img{width:100%;border:2px solid #fff}#player,.rf-wrapper iframe{width:100%;height:100%}.slick-slide{width:3%!important;margin-right:70px;height:auto}.slick-next::before,.slick-prev::before{font-family:FontAwesome!important}.slick-next::before,.slick-prev::before{font-size:40px;border:3px solid;color:#000;border-radius:50%;padding:6px 8px}.slick-next,.slick-prev{top:110%!important}.slick-prev{left:45%}.slick-next{right:45%}body{margin-right:0}
        .slick-slide {
            height: 338px !important;
        }
    </style>
    <?php 
}
add_action('wp_head', 'main_css_vs');

function main_javascript_vs(){
    ?>
    <script>
        jQuery(document).ready(function(){
            jQuery('.carousel').slick({
                slidesToShow: 1,
                dots:false,
                slidesPerRow: 1,
                // centerMode: true,
                infinite: true,
                variableWidth: true,
                prevArrow: '<span class="slick-prev"><i class="fa fa-arrow-left" aria-hidden="true"></i></span>',
                nextArrow: '<span class="slick-next"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>'
            });
        });
    </script>
    <?php 
}
add_action('wp_footer', 'main_javascript_vs');

/**
 * Show the Slider
 */

function show_slider_vs( $atts ){
    ob_start();

    $atts = shortcode_atts( array(
        'category' => ''
    ), $atts );

    //Custom Query
    $query = new WP_Query(
        [
            'post_type' => 'video_slider',
            'tax_query' => [
                [
                    'taxonomy' => 'sliders_name',
                    'field'    => 'slug',
                    'terms'    =>  $atts
                ]
            ]
        ]
    );

    query_posts($query);
    ?>
        <div class="rf-wrapper">
            <div class="carousel">
                <?php while ($query->have_posts()): $query->the_post(); 

                $video_url_yt = get_field( "video_url_vs" ); 
                $video_url_vv = get_field( "video_url_vs_vimeo" ); 
                
                ?>
                    <div>
                        <?php if( !empty($video_url_yt) ){ ?> 
                            <iframe   src="<?php echo $video_url_yt; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <?php } ?>
                        <?php if( !empty($video_url_vv) ){ ?> 
                            <iframe   src="<?php echo $video_url_vv; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        <?php } ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php 
    return ob_get_clean();
    wp_reset_query();
}
/**
 * @Register shortcode [video_slider]
 */
add_shortcode('video_slider', 'show_slider_vs');

/**
 * ACF Installetaion Check 😉
 */
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5f5525649ebe9',
        'title' => 'Video URL Vimeo',
        'fields' => array(
            array(
                'key' => 'field_5f552564acf90',
                'label' => 'Vimeo Video URL',
                'name' => 'video_url_vs_vimeo',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'Ex: https://player.vimeo.com/video/108018156?title=0&byline=0',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'video_slider',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_5f51284f52e3c',
        'title' => 'YT Video URL',
        'fields' => array(
            array(
                'key' => 'field_5f51286b44bb6',
                'label' => 'YouTube Video URL',
                'name' => 'video_url_vs',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'Ex: https://www.youtube.com/embed/rDYdeq3JW_E',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'video_slider',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
    
    endif;