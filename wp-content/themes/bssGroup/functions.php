<?php 
// Constants
define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );
define( 'THEME_CSS_DIR', THEME_URI . '/css-js/' );
define( 'THEME_Framework', THEME_URI . '/framework/' );
/***************************************************************************
*
*							Redux Implmentation
*
***************************************************************************/

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/framework/redux/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/framework/redux/ReduxCore/framework.php' );
}
// if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/sample/sample-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/framework/redux_options.php' );
// }
/***************************************************************************
*
*							Common Functions
*
***************************************************************************/
add_theme_support( 'post-thumbnails' ); 
/* Remove default post type */
add_action('admin_menu','remove_default_post_type');

function remove_default_post_type() {
	remove_menu_page('edit.php');
	remove_menu_page('upload.php');
	
}
add_action( 'admin_menu', 'remove_redux_menu',12 );
function remove_redux_menu() {
    remove_submenu_page('tools.php','redux-about');
}
/* translation */
load_theme_textdomain( 'bssGroup', THEME_DIR.'/languages' );

/* Pagination */
function pagination($pages = '', $range = 4)
{  
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>";
         // if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         // if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"btn primary active\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"btn primary\">".$i."</a>";
             }
         }
 
         // if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
         // if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}
/* Youtube Image */
function youtube_image($id) {
    $resolution = array (
        // 'maxresdefault',
        // 'sddefault',
        // 'mqdefault',
        // 'hqdefault',
        'default'
    );

    for ($x = 0; $x < sizeof($resolution); $x++) {
        $url = '//img.youtube.com/vi/' . $id . '/' . $resolution[$x] . '.jpg';
        if (get_headers($url)[0] == 'HTTP/1.0 200 OK') {
            break;
        }
    }
    return $url;
}
function youtube_code($url)
{
	parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
	return $my_array_of_vars['v'];
}
the_post_thumbnail_url( 'thumbnail' );       // Thumbnail (default 150px x 150px max)
the_post_thumbnail_url( 'medium' );          // Medium resolution (default 300px x 300px max)
the_post_thumbnail_url( 'large' );           // Large resolution (default 640px x 640px max)
the_post_thumbnail_url( 'full' );            // Full resolution (original size uploaded)
 
/***************************************************************************
*
*							Scripts && Styles
*
***************************************************************************/

add_action( 'wp_enqueue_scripts', 'bssgroup_theme_enqueue_styles' );
function bssgroup_theme_enqueue_styles() {
	$styles = array(
		'animations'  => 'animations.css',
		'tornado-rtl' => 'tornado-rtl.css',
		'magnific-popup' => 'magnific-popup.css',
		
	);
	foreach ( $styles as $key => $sc ) {
		wp_register_style( $key, THEME_CSS_DIR . '/' . $sc );
		wp_enqueue_style( $key );
	}

	//Default stylesheet file (style.css)
	if ( is_rtl() ) {
	  wp_register_style( 'main_stylesheet_rtl', THEME_URI . '/style_rtl.css' );
		wp_enqueue_style( 'main_stylesheet_rtl' );
	}else{
		wp_register_style( 'main_stylesheet', THEME_URI . '/style.css' );
		wp_enqueue_style( 'main_stylesheet' );
	}
	
	//Javascript Files

		$scripts = array(
			'jquery.min' => 'jquery.min.js',
			'tornado' => 'tornado.js',
			'magnific-popup' => 'jquery.magnific-popup.min.js',
			'script-rtl'       => 'script-rtl.js',
			
		);
	

	foreach ( $scripts as $alias => $src ) {
		wp_enqueue_script( $alias, THEME_CSS_DIR . "$src", array( 'jquery' ), "1.0", false );
		
	}
	wp_enqueue_script( "googlemp",  "https://maps.googleapis.com/maps/api/js?key=AIzaSyBUZm6TI_Ik_7OO4pGd1ARqwdfHsD0HcoQ", array( 'jquery' ), "1.0", false );
		wp_enqueue_script( "gmap3",  "https://cdn.jsdelivr.net/gmap3/7.2.0/gmap3.min.js", array( 'jquery' ), "1.0", false );
	if ( is_singular() ) {
		wp_enqueue_script( "comment-reply" );
	}
}
/***************************************************************************
*
*							Seo
*
***************************************************************************/
add_action( 'wp_head', 'bssgroup_seo_meta', 1000 );
function bssgroup_seo_meta() {
	if ( is_singular() ) {
		if ( has_post_thumbnail() ) {
			$post_thumbnail_id  = get_post_thumbnail_id( get_the_ID() );
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id ); ?>
            <meta property="og:image" content="<?php echo $post_thumbnail_url; ?>"/>
			<?php
		} ?>
        <meta property="og:title" content="<?php echo get_the_title( get_the_ID() ); ?>"/>
        <meta property="og:url" content="<?php echo get_permalink( get_the_ID() ); ?>"/>
	<?php } else { ?>
        <meta property="og:title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>"/>
        <meta property="og:url" content="<?php bloginfo( 'url' ); ?>"/>
	<?php } ?>
    <meta http-equiv="Content-Type"
          content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>"/>
    <meta name="generator" content="WordPress <?php bloginfo( 'version' ); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo( 'pingback url' ); ?>"/>
    <meta name="copyright" content="<?php bloginfo( 'name' ); ?>"/>
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo( 'rss2_url' ); ?>"/>
    <link rel="canonical" href="<?php bloginfo( 'url' ); ?>"/>
    <meta property="og:locale" content="ar_AR"/>
    <meta property="og:type" content="website"/>
    <meta property="og:description" content="<?php bloginfo( 'description' ); ?>"/>
    <meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:description" content="<?php bloginfo( 'description' ); ?>"/>
    <meta name="twitter:title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>"/>
    <meta name="twitter:domain" content="<?php bloginfo( 'name' ); ?>"/>
	<?php
}
/***************************************************************************
*
*							Staff Members Post Types
*
***************************************************************************/
function bssGroup_Staff_Mebmbers() {

	$labels = array(
		'name'                => __( 'فريق العمل', 'bssGroup' ),
		'singular_name'       => __( 'عضو فريق العمل', 'bssGroup' ),
		'add_new'             => _x( 'أضف عضو جديد', 'bssGroup', 'bssGroup' ),
		'add_new_item'        => __( 'أضف عضو جديد', 'bssGroup' ),
		'edit_item'           => __( 'تعديل عضو فريق العمل', 'bssGroup' ),
		'new_item'            => __( 'عضو جديد بفريق العمل', 'bssGroup' ),
		'view_item'           => __( 'مشاهدة عضو فريق العمل', 'bssGroup' ),
		'search_items'        => __( 'بحث فى فريق العمل', 'bssGroup' ),
		'not_found'           => __( 'لا يوجد اعضاء فى فريق العمل ', 'bssGroup' ),
		'not_found_in_trash'  => __( 'لا يوجد اعضاء من فريق العمل فى سلة المهملات', 'bssGroup' ),
		'parent_item_colon'   => __( 'العضو الاب لعضو فريق العمل', 'bssGroup' ),
		'menu_name'           => __( 'فريق العمل', 'bssGroup' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array('title','editor','thumbnail')
	);

	register_post_type( 'staff_members', $args );
}

add_action( 'init', 'bssGroup_Staff_Mebmbers' );

/******************* MetaBoxs ***************************************/
function member_add_meta_box() {
	//this will add the metabox for the member post type
	$screens = array( 'staff_members' );

	foreach ( $screens as $screen ) {

	    add_meta_box(
	        'member_sectionid',
	        __( 'بيانات عضو فريق العمل', 'bssGroup' ),
	        'member_meta_box_callback',
	        $screen
	    );
 	}
}
add_action( 'add_meta_boxes', 'member_add_meta_box' );


function member_meta_box_callback( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'member_save_meta_box_data', 'member_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$member_position = get_post_meta( $post->ID, 'member_position', true );

	echo '<label for="member_position">';
	_e( 'المسمى الوظيفى', 'bssGroup' );
	echo '</label> ';
	echo '<input type="text" id="member_position" name="member_position" value="' . esc_attr( $member_position ) . '" size="25" />';
	echo "<br><br>";
	$member_linkdin = get_post_meta( $post->ID, 'member_linkdin', true );

	echo '<label for="member_linkdin">';
	_e( 'رابط linkdin', 'bssGroup' );
	echo '</label> ';
	echo '<input type="text" id="member_linkdin" name="member_linkdin" value="' . esc_attr( $member_linkdin ) . '" size="25" />';
}


 function member_save_meta_box_data( $post_id ) {

	if ( ! isset( $_POST['member_meta_box_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['member_meta_box_nonce'], 'member_save_meta_box_data' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

	if ( ! current_user_can( 'edit_page', $post_id ) ) {
	    return;
	}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
		    return;
		}
	}

	if ( ! isset( $_POST['member_position'] ) ) {
		return;
	}
	if ( ! isset( $_POST['member_linkdin'] ) ) {
		return;
	}

	$member_position = sanitize_text_field( $_POST['member_position'] );

	update_post_meta( $post_id, 'member_position', $member_position );

	$member_linkdin = sanitize_text_field( $_POST['member_linkdin'] );

	update_post_meta( $post_id, 'member_linkdin', $member_linkdin );
}
add_action( 'save_post', 'member_save_meta_box_data' );

/***************************************************************************
*
*							Media Post Types
*
***************************************************************************/
function bssGroup_Media() {

	$labels = array(
		'name'                => __( 'الوسائط', 'bssGroup' ),
		'singular_name'       => __( 'عنصر فى الوسائط', 'bssGroup' ),
		'add_new'             => _x( 'أضف عنصر جديد', 'bssGroup', 'bssGroup' ),
		'add_new_item'        => __( 'أضف عنصر جديد', 'bssGroup' ),
		'edit_item'           => __( 'تعديل عنصر الوسائط', 'bssGroup' ),
		'new_item'            => __( 'عنصر جديد بالوسائط', 'bssGroup' ),
		'view_item'           => __( 'مشاهدة عنصر الوسائط', 'bssGroup' ),
		'search_items'        => __( 'بحث فى الوسائط', 'bssGroup' ),
		'not_found'           => __( 'لا يوجد عناصر فى الوسائط ', 'bssGroup' ),
		'not_found_in_trash'  => __( 'لا يوجد عناصر من الوسائط فى سلة المهملات', 'bssGroup' ),
		'parent_item_colon'   => __( 'العنصر الاب لعنصر الوسائط', 'bssGroup' ),
		'menu_name'           => __( 'الوسائط', 'bssGroup' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array('title','editor','thumbnail','post-formats')
	);

	register_post_type( 'media', $args );
}

add_action( 'init', 'bssGroup_Media' );

/******************* MetaBoxs ***************************************/
function gallery_metabox_enqueue($hook) {
if ( 'post.php' == $hook || 'post-new.php' == $hook ) {
  wp_enqueue_script('gallery-metabox', THEME_Framework . 'assets/js/gallery-metabox.js', array('jquery', 'jquery-ui-sortable'));
  wp_enqueue_style('gallery-metabox', THEME_Framework . 'assets/css/gallery-metabox.css');
}
}
  add_action('admin_enqueue_scripts', 'gallery_metabox_enqueue');

add_theme_support( 'post-formats', array( 'gallery', 'video' ) );

$metaboxes = array(
    'gallery' => array(
        'title' => __('الصور', 'bssGroup'),
        'applicableto' => 'media',
        'location' => 'normal',
        'display_condition' => 'post-format-gallery',
        'priority' => 'low',
        'fields' => array(
            'gallery_images' => array(
            	'title' => __('معرض الصور:', 'bssGroup'),
                'type' => 'gallery',
            )
        )
    ),
    'video_code' => array(
        'title' => __('كود الفيديو', 'bssGroup'),
        'applicableto' => 'media',
        'location' => 'normal',
        'display_condition' => 'post-format-video',
        'priority' => 'low',
        'fields' => array(
            'video_code_2' => array(
                'title' => __('كود الفيديو:', 'bssGroup'),
                'type' => 'text',
                'description' => '',
                'size' => 20
            )
        )
    )
);
add_action( 'admin_init', 'add_post_format_metabox' );
 
function add_post_format_metabox() {
    global $metaboxes;
 
    if ( ! empty( $metaboxes ) ) {
        foreach ( $metaboxes as $id => $metabox ) {
            add_meta_box( $id, $metabox['title'], 'show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id );
        }
    }
}
function show_metaboxes( $post, $args ) {
    global $metaboxes;
 
    $custom = get_post_custom( $post->ID );
    $fields = $tabs = $metaboxes[$args['id']]['fields'];
 
    /** Nonce **/
    $output = '<input type="hidden" name="post_format_meta_box_nonce" value="' . wp_create_nonce( basename( __FILE__ ) ) . '" />';
 
    if ( sizeof( $fields ) ) {
        foreach ( $fields as $id => $field ) {
            switch ( $field['type'] ) {
                default:
                case "text":
                    $output .= '<label for="input' . $id . '">' . $field['title'] . '</label><input id="input' . $id . '" type="text" name="' . $id . '" value="' . $custom[$id][0] . '" size="' . $field['size'] . '" />';
 				break;
 				case 'gallery':
 					$ids = get_post_meta($post->ID, 'gallery_images', true);
 					$output .= '<table class="form-table"><tr><td><a class="gallery-add button" href="#" data-uploader-title="'.__( 'اضافة الصور الى المعرض', 'bssGroup' ).'" data-uploader-button-text="'.__( 'اضافة الصور الى المعرض', 'bssGroup' ).'">'.__( 'اضافة الصور', 'bssGroup' ).'</a><ul id="gallery-metabox-list">';
						         if ($ids) : foreach ($ids as $key => $value) : $image = wp_get_attachment_image_src($value); 

						        $output .='  <li>
						            <input type="hidden" name="gallery_images[<?php echo $key; ?>]" value="'.$value .'">
						            <img class="image-preview" src="'. $image[0].'"><a class="change-image button button-small" href="#" data-uploader-title="'. __( 'تغيير الصورة', 'bssGroup' ) .'" data-uploader-button-text="'. __( 'تغيير الصورة', 'bssGroup' ) .'">Change image</a><br><small><a class="remove-image" href="#">'. __( 'حذف الصورة', 'bssGroup' ).'</a></small></li>';

						         endforeach; endif; 
						    $output .='    </ul>

						      </td></tr>
						    </table>';

                    break;
            }
        }
    }
 
    echo $output;
}
add_action( 'save_post', 'save_metaboxes' );
 
function save_metaboxes( $post_id ) {
    global $metaboxes;
 
    // verify nonce
    if ( ! wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename( __FILE__ ) ) )
        return $post_id;
 
    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;
 
    // check permissions
    if ( 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }
 
    $post_type = get_post_type();
 
    // loop through fields and save the data
    foreach ( $metaboxes as $id => $metabox ) {
        // check if metabox is applicable for current post type
        if ( $metabox['applicableto'] == $post_type ) {
            $fields = $metaboxes[$id]['fields'];
 
            foreach ( $fields as $id => $field ) {
                $old = get_post_meta( $post_id, $id, true );
                $new = $_POST[$id];
 
                if ( $new && $new != $old ) {
                    update_post_meta( $post_id, $id, $new );
                }
                elseif ( '' == $new && $old || ! isset( $_POST[$id] ) ) {
                    delete_post_meta( $post_id, $id, $old );
                }
            }
        }
    }
}

function admin_inline_js(){
	 global $metaboxes;
    if ( get_post_type() == "media" ) :
        
        echo '<script type="text/javascript">'."\n";
       // echo "    $ = jQuery;"."\n";
            $formats = $ids = array();
            foreach ( $metaboxes as $id => $metabox ) {
                array_push( $formats, "'" . $metabox['display_condition'] . "': '" . $id . "'" );
                array_push( $ids, "#" . $id );
            }
            
 
            echo "var formats = { ". implode( ',', $formats )." };"."\n";
            echo 'var ids = "'.implode( ',', $ids ) .'";'."\n";
			echo "function displayMetaboxes() {"."\n";
                // Hide all post format metaboxes
            echo "    jQuery(ids).hide();"."\n";
                // Get current post format
            echo ' var selectedElt = jQuery("input[name=\'post_format\']:checked").attr("id");'."\n";
 
                // If exists, fade in current post format metabox
                echo "if ( formats[selectedElt] )"."\n";
                echo '    jQuery("#" + formats[selectedElt]).fadeIn();'."\n";
            echo "}"."\n";
 
            echo "jQuery(function() {"."\n";
                // Show/hide metaboxes on page load
                echo "displayMetaboxes();"."\n";
 
                // Show/hide metaboxes on change event
                echo 'jQuery("input[name=\'post_format\']").change(function() {'."\n";
                    echo "displayMetaboxes();"."\n";
                echo "});"."\n";
            echo "});"."\n";
 
		echo "\n</script>";
        
	endif;
}
add_action( 'admin_head', 'admin_inline_js' ,1000);
/***************************************************************************
*
*							News Post Types
*
***************************************************************************/
function bssGroup_News() {

	$labels = array(
		'name'                => __( 'اخر الاخبار', 'bssGroup' ),
		'singular_name'       => __( 'خبر ', 'bssGroup' ),
		'add_new'             => _x( 'أضف خبر جديد', 'bssGroup', 'bssGroup' ),
		'add_new_item'        => __( 'أضف خبر جديد', 'bssGroup' ),
		'edit_item'           => __( 'تعديل الخبر', 'bssGroup' ),
		'new_item'            => __( 'خبر جديد بالاخبار', 'bssGroup' ),
		'view_item'           => __( 'مشاهدة خبر الاخبار', 'bssGroup' ),
		'search_items'        => __( 'بحث فى الاخبار', 'bssGroup' ),
		'not_found'           => __( 'لا يوجد اعضاء فى الاخبار ', 'bssGroup' ),
		'not_found_in_trash'  => __( 'لا يوجد اعضاء من الاخبار فى سلة المهملات', 'bssGroup' ),
		'parent_item_colon'   => __( 'الخبر الاب لخبر الاخبار', 'bssGroup' ),
		'menu_name'           => __( 'اخر الاخبار', 'bssGroup' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array('title','editor','thumbnail','comments')
	);

	register_post_type( 'news', $args );
}

add_action( 'init', 'bssGroup_News' );
/***************************************************************************
*
*							Services Post Types
*
***************************************************************************/
function bssGroup_services() {

	$labels = array(
		'name'                => __( 'الخدمات', 'bssGroup' ),
		'singular_name'       => __( 'خدمة', 'bssGroup' ),
		'add_new'             => _x( 'أضف خدمة جديد', 'bssGroup', 'bssGroup' ),
		'add_new_item'        => __( 'أضف خدمة جديد', 'bssGroup' ),
		'edit_item'           => __( 'تعديل الخدمة', 'bssGroup' ),
		'new_item'            => __( 'خدمة جديد بالاخبار', 'bssGroup' ),
		'view_item'           => __( 'مشاهدة خدمة الاخبار', 'bssGroup' ),
		'search_items'        => __( 'بحث فى الاخبار', 'bssGroup' ),
		'not_found'           => __( 'لا يوجد اعضاء فى الاخبار ', 'bssGroup' ),
		'not_found_in_trash'  => __( 'لا يوجد اعضاء من الاخبار فى سلة المهملات', 'bssGroup' ),
		'parent_item_colon'   => __( 'الخدمة الاب لخدمة الاخبار', 'bssGroup' ),
		'menu_name'           => __( 'الخدمات', 'bssGroup' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array('title','editor','thumbnail')
	);

	register_post_type( 'services', $args );
}

add_action( 'init', 'bssGroup_services' );
/***************************************************************************
*
*							Events Post Types
*
***************************************************************************/
function bssGroup_events() {

	$labels = array(
		'name'                => __( 'انشطة BSS', 'bssGroup' ),
		'singular_name'       => __( 'نشاط', 'bssGroup' ),
		'add_new'             => _x( 'أضف نشاط جديد', 'bssGroup', 'bssGroup' ),
		'add_new_item'        => __( 'أضف نشاط جديد', 'bssGroup' ),
		'edit_item'           => __( 'تعديل النشاط', 'bssGroup' ),
		'new_item'            => __( 'نشاط جديد بالاخبار', 'bssGroup' ),
		'view_item'           => __( 'مشاهدة نشاط الاخبار', 'bssGroup' ),
		'search_items'        => __( 'بحث فى الاخبار', 'bssGroup' ),
		'not_found'           => __( 'لا يوجد اعضاء فى الاخبار ', 'bssGroup' ),
		'not_found_in_trash'  => __( 'لا يوجد اعضاء من الاخبار فى سلة المهملات', 'bssGroup' ),
		'parent_item_colon'   => __( 'النشاط الاب لنشاط الاخبار', 'bssGroup' ),
		'menu_name'           => __( 'انشطة BSS', 'bssGroup' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array('title','editor','thumbnail')
	);

	register_post_type( 'events', $args );
}

add_action( 'init', 'bssGroup_events' );
/***************************************************************************
*
*								Projects
*
***************************************************************************/
function bssGroup_projects() {

	$labels = array(
		'name'                => __( 'المشروعات', 'bssGroup' ),
		'singular_name'       => __( 'مشروع', 'bssGroup' ),
		'add_new'             => _x( 'أضف مشروع جديد', 'bssGroup', 'bssGroup' ),
		'add_new_item'        => __( 'أضف مشروع جديد', 'bssGroup' ),
		'edit_item'           => __( 'تعديل المشروع', 'bssGroup' ),
		'new_item'            => __( 'مشروع جديد بالاخبار', 'bssGroup' ),
		'view_item'           => __( 'مشاهدة مشروع الاخبار', 'bssGroup' ),
		'search_items'        => __( 'بحث فى الاخبار', 'bssGroup' ),
		'not_found'           => __( 'لا يوجد اعضاء فى الاخبار ', 'bssGroup' ),
		'not_found_in_trash'  => __( 'لا يوجد اعضاء من الاخبار فى سلة المهملات', 'bssGroup' ),
		'parent_item_colon'   => __( 'المشروع الاب لمشروع الاخبار', 'bssGroup' ),
		'menu_name'           => __( 'المشروعات', 'bssGroup' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array('title','editor','thumbnail')
	);

	register_post_type( 'projects', $args );
}

add_action( 'init', 'bssGroup_projects' );

// Little function to return a custom field value
function wpshed_get_custom_field( $value ) {
	global $post;

    $custom_field = get_post_meta( $post->ID, $value, true );
    if ( !empty( $custom_field ) )
	    return is_array( $custom_field ) ? stripslashes_deep( $custom_field ) : stripslashes( wp_kses_decode_entities( $custom_field ) );

    return false;
}

// Register the Metabox
function wpshed_add_custom_meta_box() {
	add_meta_box( 'wpshed-meta-box', __( 'موقع المشروع', 'bssGroup' ), 'wpshed_meta_box_output', 'projects', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'wpshed_add_custom_meta_box' );

// Output the Metabox
function wpshed_meta_box_output( $post ) {
	// create a nonce field
	wp_nonce_field( 'my_wpshed_meta_box_nonce', 'wpshed_meta_box_nonce' ); ?>
	
	<p>
		<label for="wpshed_textfield"><?php _e( 'موقع المشروع', 'bssGroup' ); ?>:</label>
		<input type="text" name="wpshed_textfield" id="wpshed_textfield" value="<?php echo wpshed_get_custom_field( 'wpshed_textfield' ); ?>" size="50" />
    </p>
	    
	<?php
}

// Save the Metabox values
function wpshed_meta_box_save( $post_id ) {
	// Stop the script when doing autosave
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// Verify the nonce. If insn't there, stop the script
	if( !isset( $_POST['wpshed_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['wpshed_meta_box_nonce'], 'my_wpshed_meta_box_nonce' ) ) return;

	// Stop the script if the user does not have edit permissions
	if( !current_user_can( 'edit_post' ) ) return;

    // Save the textfield
	if( isset( $_POST['wpshed_textfield'] ) )
		update_post_meta( $post_id, 'wpshed_textfield', esc_attr( $_POST['wpshed_textfield'] ) );

    // Save the textarea
	if( isset( $_POST['wpshed_textarea'] ) )
		update_post_meta( $post_id, 'wpshed_textarea', esc_attr( $_POST['wpshed_textarea'] ) );
}
add_action( 'save_post', 'wpshed_meta_box_save' );

add_action('admin_init', 'hhs_add_meta_boxes', 1);
function hhs_add_meta_boxes() {
    add_meta_box( 'repeatable-fields', __( 'تفاصيل المشروع', 'bssGroup' ), 'hhs_repeatable_meta_box_display', 'projects', 'normal', 'default');
}
function hhs_repeatable_meta_box_display() {
    global $post;
    $project_details = get_post_meta($post->ID, 'project_details', true);
    wp_nonce_field( 'hhs_repeatable_meta_box_nonce', 'hhs_repeatable_meta_box_nonce' );
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function( $ ){
        $( '#add-row' ).on('click', function() {
            var row = $( '.empty-row.screen-reader-text' ).clone(true);
            row.removeClass( 'empty-row screen-reader-text' );
            row.insertBefore( '#repeatable-fieldset-one tbody>tr:last' );
            return false;
        });

        $( '.remove-row' ).on('click', function() {
            $(this).parents('tr').remove();
            return false;
        });
    });
    </script>

    <table id="repeatable-fieldset-one" width="100%">
    <thead>
        <tr>
            <th width="40%">Name</th>
            <th width="8%"></th>
        </tr>
    </thead>
    <tbody>
    <?php

    if ( $project_details ) :

    foreach ( $project_details as $field ) {
    ?>
    <tr>
        <td><input type="text" class="widefat" name="name[]" value="<?php if($field['name'] != '') echo esc_attr( $field['name'] ); ?>" /></td>


        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    <?php
    }
    else :
    // show a blank one
    ?>
    <tr>
        <td><input type="text" class="widefat" name="name[]" /></td>


        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    <?php endif; ?>

    <!-- empty hidden one for jQuery -->
    <tr class="empty-row screen-reader-text">
        <td><input type="text" class="widefat" name="name[]" /></td>


        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    </tbody>
    </table>

    <p><a id="add-row" class="button" href="#">Add another</a></p>
    <?php
}
add_action('save_post', 'hhs_repeatable_meta_box_save');
function hhs_repeatable_meta_box_save($post_id) {
    if ( ! isset( $_POST['hhs_repeatable_meta_box_nonce'] ) ||
    ! wp_verify_nonce( $_POST['hhs_repeatable_meta_box_nonce'], 'hhs_repeatable_meta_box_nonce' ) )
        return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    $old = get_post_meta($post_id, 'project_details', true);
    $new = array();

    $names = $_POST['name'];

    $count = count( $names );

    for ( $i = 0; $i < $count; $i++ ) {
        if ( $names[$i] != '' ) :
            $new[$i]['name'] = stripslashes( strip_tags( $names[$i] ) );

            
        endif;
    }
    if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'project_details', $new );
    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'project_details', $old );
}


add_action('admin_init', 'hhs_add_meta_boxes2', 1);
function hhs_add_meta_boxes2() {
    add_meta_box( 'repeatable-fields2', __( 'اهداف المشروع', 'bssGroup' ), 'hhs_repeatable_meta_box_display2', 'projects', 'normal', 'default');
}
function hhs_repeatable_meta_box_display2() {
    global $post;
    $project_probs = get_post_meta($post->ID, 'project_probs', true);
    wp_nonce_field( 'hhs_repeatable_meta_box_nonce2', 'hhs_repeatable_meta_box_nonce2' );
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function( $ ){
        $( '#add-row2' ).on('click', function() {
            var row = $( '#repeatable-fieldset-one2 .empty-row.screen-reader-text' ).clone(true);
            row.removeClass( 'empty-row screen-reader-text' );
            row.insertBefore( '#repeatable-fieldset-one2 tbody>tr:last' );
            return false;
        });

        $( '.remove-row' ).on('click', function() {
            $(this).parents('tr').remove();
            return false;
        });
    });
    </script>

    <table id="repeatable-fieldset-one2" width="100%">
    <thead>
        <tr>
            <th width="40%">Name</th>
            <th width="8%"></th>
        </tr>
    </thead>
    <tbody>
    <?php

    if ( $project_probs ) :

    foreach ( $project_probs as $field ) {
    ?>
    <tr>
        <td><input type="text" class="widefat" name="project_probsname[]" value="<?php if($field['project_probsname'] != '') echo esc_attr( $field['project_probsname'] ); ?>" /></td>


        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    <?php
    }
    else :
    // show a blank one
    ?>
    <tr>
        <td><input type="text" class="widefat" name="project_probsname[]" /></td>


        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    <?php endif; ?>

    <!-- empty hidden one for jQuery -->
    <tr class="empty-row screen-reader-text">
        <td><input type="text" class="widefat" name="project_probsname[]" /></td>


        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    </tbody>
    </table>

    <p><a id="add-row2" class="button" href="#">Add another</a></p>
    <?php
}
add_action('save_post', 'hhs_repeatable_meta_box_save2');
function hhs_repeatable_meta_box_save2($post_id) {
    if ( ! isset( $_POST['hhs_repeatable_meta_box_nonce'] ) ||
    ! wp_verify_nonce( $_POST['hhs_repeatable_meta_box_nonce'], 'hhs_repeatable_meta_box_nonce' ) )
        return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    $old = get_post_meta($post_id, 'project_probs', true);
    $new = array();

    $names = $_POST['project_probsname'];

    $count = count( $names );

    for ( $i = 0; $i < $count; $i++ ) {
        if ( $names[$i] != '' ) :
            $new[$i]['project_probsname'] = stripslashes( strip_tags( $names[$i] ) );

            
        endif;
    }
    if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'project_probs', $new );
    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'project_probs', $old );
}
//
$meta_box_media_upload = new Meta_Box_Media_Upload();
class Meta_Box_Media_Upload {
	function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'setup_box' ) );
		add_action( 'save_post', array( $this, 'save_box' ), 10, 2 );
	}
	function setup_box() {
		add_meta_box( 'meta_box_id', __( 'لوجو المشروع', 'bssGroup' ), array( $this, 'meta_box_contents' ), 'projects', 'normal' );
	}
	function meta_box_contents() {
		wp_enqueue_media();
		wp_enqueue_script( 'meta-box-media', THEME_Framework . 'assets/js/media.js', array('jquery') );
		wp_nonce_field( 'nonce_action', 'nonce_name' );
		// one or more
		$field_names = array( 'companylogo',  );
		foreach ( $field_names as $name ) {
			$value = $rawvalue = get_post_meta( get_the_id(), $name, true );
			$name = esc_attr( $name );
			$value = esc_attr( $name );
			echo "<input type='hidden' id='$name-value'  class='small-text'       name='meta-box-media[$name]'            value='$value' />";
			echo "<input type='button' id='$name'        class='button meta-box-upload-button'        value='Upload' />";
			echo "<input type='button' id='$name-remove' class='button meta-box-upload-button-remove' value='Remove' />";
			$image = ! $rawvalue ? '' : wp_get_attachment_image( $rawvalue, 'full', false, array('style' => 'max-width:100%;height:auto;') );
			echo "<div class='image-preview'>$image</div>";
			echo '<br />';
		}
	}
	function save_box( $post_id, $post ) {
		if ( ! isset( $_POST['nonce_name'] ) ) //make sure our custom value is being sent
			return;
		if ( ! wp_verify_nonce( $_POST['nonce_name'], 'nonce_action' ) ) //verify intent
			return;
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) //no auto saving
			return;
		if ( ! current_user_can( 'edit_post', $post_id ) ) //verify permissions
			return;
		$new_value = array_map( 'intval', $_POST['meta-box-media'] ); //sanitize
		foreach ( $new_value as $k => $v ) {
			update_post_meta( $post_id, $k, $v ); //save
		}
	}
}
/***************************************************************************
*
*								jobs
*
***************************************************************************/
function bssGroup_jobs() {

	$labels = array(
		'name'                => __( 'الوظائف', 'bssGroup' ),
		'singular_name'       => __( 'وظيفة', 'bssGroup' ),
		'add_new'             => _x( 'أضف وظيفة جديد', 'bssGroup', 'bssGroup' ),
		'add_new_item'        => __( 'أضف وظيفة جديد', 'bssGroup' ),
		'edit_item'           => __( 'تعديل الوظيفة', 'bssGroup' ),
		'new_item'            => __( 'وظيفة جديد بالاخبار', 'bssGroup' ),
		'view_item'           => __( 'مشاهدة وظيفة الاخبار', 'bssGroup' ),
		'search_items'        => __( 'بحث فى الاخبار', 'bssGroup' ),
		'not_found'           => __( 'لا يوجد اعضاء فى الاخبار ', 'bssGroup' ),
		'not_found_in_trash'  => __( 'لا يوجد اعضاء من الاخبار فى سلة المهملات', 'bssGroup' ),
		'parent_item_colon'   => __( 'الوظيفة الاب لوظيفة الاخبار', 'bssGroup' ),
		'menu_name'           => __( 'الوظائف', 'bssGroup' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array('title','editor','thumbnail')
	);

	register_post_type( 'jobs', $args );
}

add_action( 'init', 'bssGroup_jobs' );
add_action('admin_init', 'hhs_add_meta_boxes3', 1);

function hhs_add_meta_boxes3() {
    add_meta_box( 'repeatable-fields', __( 'شروط الوظيفه', 'bssGroup' ), 'hhs_repeatable_meta_box_display3', 'jobs', 'normal', 'default');
}
function hhs_repeatable_meta_box_display3() {
    global $post;
    $job_req = get_post_meta($post->ID, 'job_req', true);
    wp_nonce_field( 'hhs_repeatable_meta_box_nonce', 'hhs_repeatable_meta_box_nonce' );
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function( $ ){
        $( '#add-row' ).on('click', function() {
            var row = $( '.empty-row.screen-reader-text' ).clone(true);
            row.removeClass( 'empty-row screen-reader-text' );
            row.insertBefore( '#repeatable-fieldset-one tbody>tr:last' );
            return false;
        });

        $( '.remove-row' ).on('click', function() {
            $(this).parents('tr').remove();
            return false;
        });
    });
    </script>

    <table id="repeatable-fieldset-one" width="100%">
    <thead>
        <tr>
            <th width="40%">Name</th>
            <th width="8%"></th>
        </tr>
    </thead>
    <tbody>
    <?php

    if ( $job_req ) :

    foreach ( $job_req as $field ) {
    ?>
    <tr>
        <td><input type="text" class="widefat" name="name[]" value="<?php if($field['name'] != '') echo esc_attr( $field['name'] ); ?>" /></td>


        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    <?php
    }
    else :
    // show a blank one
    ?>
    <tr>
        <td><input type="text" class="widefat" name="name[]" /></td>


        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    <?php endif; ?>

    <!-- empty hidden one for jQuery -->
    <tr class="empty-row screen-reader-text">
        <td><input type="text" class="widefat" name="name[]" /></td>


        <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
    </tbody>
    </table>

    <p><a id="add-row" class="button" href="#">Add another</a></p>
    <?php
}
add_action('save_post', 'hhs_repeatable_meta_box_save3');
function hhs_repeatable_meta_box_save3($post_id) {
    if ( ! isset( $_POST['hhs_repeatable_meta_box_nonce'] ) ||
    ! wp_verify_nonce( $_POST['hhs_repeatable_meta_box_nonce'], 'hhs_repeatable_meta_box_nonce' ) )
        return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    $old = get_post_meta($post_id, 'job_req', true);
    $new = array();

    $names = $_POST['name'];

    $count = count( $names );

    for ( $i = 0; $i < $count; $i++ ) {
        if ( $names[$i] != '' ) :
            $new[$i]['name'] = stripslashes( strip_tags( $names[$i] ) );

            
        endif;
    }
    if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'job_req', $new );
    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'job_req', $old );
}


// Register the Metabox
function wpshed_add_custom_meta_box2() {
	add_meta_box( 'wpshed-meta-box', __( 'معلومات اضافية', 'bssGroup' ), 'wpshed_meta_box_output2', 'jobs', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'wpshed_add_custom_meta_box2' );

// Output the Metabox
function wpshed_meta_box_output2( $post ) {
	// create a nonce field
	wp_nonce_field( 'my_wpshed_meta_box_nonce', 'wpshed_meta_box_nonce' ); ?>
	
	<p>
		<label for="job_req"><?php _e( 'العدد المطلوب', 'bssGroup' ); ?>:</label>
		<input type="text" name="job_req" id="job_req" value="<?php echo wpshed_get_custom_field( 'job_req' ); ?>" size="50" />
    </p>
    <p>
		<label for="job_level"><?php _e( 'المستوى التنفيذى', 'bssGroup' ); ?>:</label>
		<input type="text" name="job_level" id="job_level" value="<?php echo wpshed_get_custom_field( 'job_level' ); ?>" size="50" />
    </p>
	    
	<?php
}

// Save the Metabox values
function wpshed_meta_box_save2( $post_id ) {
	// Stop the script when doing autosave
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// Verify the nonce. If insn't there, stop the script
	if( !isset( $_POST['wpshed_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['wpshed_meta_box_nonce'], 'my_wpshed_meta_box_nonce' ) ) return;

	// Stop the script if the user does not have edit permissions
	if( !current_user_can( 'edit_post' ) ) return;

    // Save the textfield
	if( isset( $_POST['job_req'] ) )
		update_post_meta( $post_id, 'job_req', esc_attr( $_POST['job_req'] ) );

	if( isset( $_POST['job_level'] ) )
		update_post_meta( $post_id, 'job_level', esc_attr( $_POST['job_level'] ) );

 
}
add_action( 'save_post', 'wpshed_meta_box_save2' );
/***************************************************************************
*
*								 Comments
*
***************************************************************************/
function bssGroup_commentـlist($comment, $args, $depth) {
	global $post;
	$author_id = $post->post_author;
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments. ?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'bssGroup' ); ?></span> <?php comment_author_link(); ?></div>
	<?php
		break;
		default :
		// Proceed with normal comments. ?>
		<!-- Comment Block -->
            <div <?php comment_class( empty( $args['has_children'] ) ? 'Comment-Block Sub-Comment' : 'Comment-Block' ) ?>>
                <div class="Comment-Info">
                    <?php echo get_avatar( $comment, 45 ); ?>
                    <h3><?php comment_author_link(); ?>  <span><?php printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						sprintf( _x( '%1$s', '1: date', 'bssGroup' ), get_comment_date() )
					); ?> <?php esc_html_e( 'at', 'bssGroup' ); ?> <?php comment_time(); ?></span></h3>
					<?php comment_reply_link( array_merge( $args, array(
						'reply_text' => esc_html__( 'اترك رد', 'bssGroup' ),
						'depth'      => $depth,
						'max_depth'	 => $args['max_depth'] )
					) ); ?>
                </div>
                <?php comment_text(); ?>
            </div>
            <!-- // Comment Block -->

	
	<?php
		break;
	endswitch; // End comment_type check.
}
function bssGroup_comment_form()
{
	
	$fields = array(
		'author' =>'<input id="author" name="author" type="text" placeholder="' . __( 'الاسم', 'bssGroup' ) .'"' . $aria_req . ' />',

  		'email' =>'<input id="email" name="email" type="text" placeholder="' . __( 'البريد الالكترونى', 'bssGroup' ) .'" ' . $aria_req . ' />',

	);
	$args = array(
		'id_form'           => 'commentform',
		'class_form'      => 'form-ui col-s-12 col-m-7',
		'id_submit'         => 'submit',
		'class_submit'      => 'btn primary',
		'name_submit'       => 'submit',
		'title_reply'       => '<h2 class="head">'.__( 'اترك تعليقا' ,'bssGroup').'</h2>',
		'title_reply_to'    => __( 'Leave a Reply to %s' ),
		'cancel_reply_link' => __( 'Cancel Reply' ),
		'label_submit'      => __( 'Post Comment' ),
		'format'            => 'xhtml',
		'comment_field' =>  '<textarea id="comment" name="comment" placeholder="'. __( 'التعليق', 'bssGroup' ).'"  aria-required="true"></textarea></p>',
		'must_log_in' => '<p class="must-log-in">' .sprintf(__( 'لابد ان تقوم <a href="%s">بتسجيل الدخول</a> لتتمكن من التعليق.','bssGroup' ),wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )) . '</p>',
  		'logged_in_as' => '<p class="logged-in-as">' .sprintf(__( 'انت مسجل دخول كـ <a href="%1$s">%2$s</a>. <a href="%3$s">تسجيل الخروج؟</a>' ,'bssGroup'),admin_url( 'profile.php' ),$user_identity,wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )) . '</p>',
  		'comment_notes_before' => '',
  		'comment_notes_after' => '',
  		'fields' => apply_filters( 'comment_form_default_fields', $fields ),
);
return comment_form($args);
}

function wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );
/***************************************************************************
*
*								Forms
*
***************************************************************************/
add_action('wp_head','pluginname_ajaxurl');

function pluginname_ajaxurl() {
?>
<script type="text/javascript">
var ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<?php
}
function formHomeSubmision()
{
	$data = array();
	$input_values['input_1'] = $_POST['name'];
    $input_values['input_2'] = $_POST['email'];
    $input_values['input_3'] = $_POST['message'];
    $done = GFAPI::submit_form( 2, $input_values );
    $data['data'] =$done;
    if ($done['is_valid'] == true) {
        $data['success']=$done['confirmation_message'];
    }
    wp_send_json($data);
    die();
}


add_action('wp_ajax_my_special_ajax_call', 'formHomeSubmision');
add_action('wp_ajax_nopriv_my_special_ajax_call', 'formHomeSubmision');//for users that are not logged in.
/***************************************************************************
*
*								Menus
*
***************************************************************************/
register_nav_menus(array(
	'Main_Menu'=>'القائمة الرئيسية',
	'Footer1'=>'قائمة الفوتر الاولى',
	'Footer2'=>'قائمة الفوتر الثانية',
	'Footer3'=>'قائمة الفوتر الثالثة',
	) );
/***************************************************************************
*
*								Menus
*
***************************************************************************/
function add_script_footer(){ 
global $redux_demo;
	?>

<script type="text/javascript">
            function eemail_submit_ajax(url,app_id)
            {   
                txt_email_newsletter = document.getElementById("eemail_txt_email");

                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(txt_email_newsletter.value=="")
                {
                    alert("<?php _e( 'من فضلك ادخل بريد الكترونى', 'bssGroup' ) ?>");
                    txt_email_newsletter.focus();
                    return false;    
                }
                if(txt_email_newsletter.value!="" && (txt_email_newsletter.value.indexOf("@",0)==-1 || txt_email_newsletter.value.indexOf(".",0)==-1))
                {
                    alert("<?php _e( 'من فضلك قم بادخال بريد الكترونى صالح', 'bssGroup' ) ?>")
                    txt_email_newsletter.focus();
                    txt_email_newsletter.select();
                    return false;
                }
                if (!filter.test(txt_email_newsletter.value)) 
                {
                    alert('<?php _e( 'من فضلك قم بادخال بريد الكترونى صالح', 'bssGroup' ) ?>');
                    txt_email_newsletter.focus();
                    txt_email_newsletter.select();
                    return false;
                }

                if(app_id){
                    var rg_url = 'https://readygraph.com/api/v1/wordpress-enduser/'
                    var para = "email="+txt_email_newsletter.value+"&app_id="+app_id
                    eemail_submitpostrequest(rg_url,para)
                }
                document.getElementById("eemail_msg").innerHTML="<?php _e( 'تحميل ...', 'bssGroup' ) ?>";
                var date_now = "";
                var mynumber = Math.random();
                var str= "txt_email_newsletter="+ encodeURI(txt_email_newsletter.value) + "&timestamp=" + encodeURI(date_now) + "&action=eemail-subscribe";
                console.log(str)
                eemail_submitpostrequest(url, str);
            }

            var http_req = false;
            function eemail_submitpostrequest(url, parameters) 
            {
                http_req = false;
                if (window.XMLHttpRequest) 
                {
                    http_req = new XMLHttpRequest();
                    if (http_req.overrideMimeType) 
                    {
                        http_req.overrideMimeType('text/html');
                    }
                } 
                else if (window.ActiveXObject) 
                {
                    try 
                    {
                        http_req = new ActiveXObject("Msxml2.XMLHTTP");
                    } 
                    catch (e) 
                    {
                        try 
                        {
                            http_req = new ActiveXObject("Microsoft.XMLHTTP");
                        } 
                        catch (e) 
                        {
                            
                        }
                    }
                }
                if (!http_req) 
                {
                    alert('Cannot create XMLHTTP instance');
                    return false;
                }
                http_req.onreadystatechange = eemail_submitresult;
                http_req.open('POST', url, true);
                http_req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                // http_req.setRequestHeader("Content-length", parameters.length);
                // http_req.setRequestHeader("Connection", "close");
                http_req.send(parameters);
            }


            function eemail_submitresult() 
            {
                //alert(http_req.readyState);
                //alert(http_req.responseText); 
                if (http_req.readyState == 4) 
                {
                    if (http_req.status == 200) 
                    {
                        if (http_req.readyState==4 || http_req.readyState=="complete")
                        { 
                            console.log(http_req.responseText.trim())
                            if((http_req.responseText).trim() == "subscribed-successfully")
                            {
                                document.getElementById("eemail_msg").innerHTML = "<?php _e( 'تم الاتشراك بنجاح', 'bssGroup' ) ?>";
                                document.getElementById("eemail_txt_email").value="";
                            }
                            else if((http_req.responseText).trim() == "subscribed-pending-doubleoptin")
                            {
                                alert('You have successfully subscribed to the newsletter. You will receive a confirmation email in few minutes.\nPlease follow the link in it to confirm your subscription.\nIf the email takes more than 15 minutes to appear in your mailbox, please check your spam folder.');
                                document.getElementById("eemail_msg").innerHTML = "<?php _e( 'تم الاتشراك بنجاح', 'bssGroup' ) ?>";
                            }
                            else if((http_req.responseText).trim() == "already-existalready-existalready-exist0")
                            {
                                document.getElementById("eemail_msg").innerHTML = "<?php _e( 'البريد الالكترونى موجود بالفعل', 'bssGroup' ) ?>";
                            }
                            else if((http_req.responseText).trim() == "unexpected-error")
                            {
                                document.getElementById("eemail_msg").innerHTML = "<?php _e( 'اووه , خطأ غير متوقع', 'bssGroup' ) ?>";
                            }
                            else if((http_req.responseText).trim() == "invalid-email")
                            {
                                document.getElementById("eemail_msg").innerHTML = "<?php _e( 'بريد الكترونى غير صالح', 'bssGroup' ) ?>";
                            }
                            else
                            {
                                document.getElementById("eemail_msg").innerHTML = "<?php _e( 'من فضلك حاول فى وقت لاحق', 'bssGroup' ) ?>";
                                document.getElementById("eemail_txt_email").value="";
                            }
                        } 
                    }
                    else 
                    {
                        alert('There was a problem with the request.');
                    }
                }
            }
            $(document).ready(function () {
               $('.map')
                  .gmap3({
                    center:[<?php echo $redux_demo['lat'] ?>, <?php echo $redux_demo['lng'] ?>],
                    zoom:10
                  })
                  .marker([
                    {position:[<?php echo $redux_demo['lat'] ?>, <?php echo $redux_demo['lng'] ?>]},
                  ])

            });
        </script>

<?php } 

add_action('wp_footer', 'add_script_footer');