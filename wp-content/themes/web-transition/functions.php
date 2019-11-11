<?php
/**
 * webtransition functions and definitions
 *
 */
/*******************************************************************************
*
*      Déclaration des constantes
*
*******************************************************************************/
define('SINGLE_MODULE_FULL_PATH', TEMPLATEPATH . '/modules-templates');
define('SINGLE_MODULE_PATH', 'modules-templates/');

 /*******************************************************************************
*
*      Fontionc pour la sécurité utilisées dans webtransition_setup
*
*******************************************************************************/
function remove_comment_author_class( $classes ) {
  foreach( $classes as $key => $class ) {
    if(strstr($class, "comment-author-")) {
      unset( $classes[$key]
    );
  }
}
return $classes;
}
function create_my_custom_feed() {
  load_template( TEMPLATEPATH . '/feed-rss2.php');
}
function wpc_comments_closed( $open, $post_id ) {
  // $post = get_post( $post_id );
  // if ('post' == $post->post_type)
  $open = false;
  return $open;
}
function kill_autocompletion(){

  echo '<script type="text/javascript">window.onload=function(){document.getElementById("user_pass").setAttribute("autocomplete","off")};</script>';

}

/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'webtransition_setup' ) ) :

function webtransition_setup() {

	load_theme_textdomain( 'webtransition', get_template_directory() . '/languages' );

	/*
    * Security
    */
    // suppression de la version de WP
    remove_action('wp_head', 'wp_generator');
    // MASQUER LES ERREURS DE CONNEXION
    add_filter('login_errors',create_function('$a', "return null;"));
    // Désactiver Windows Live Writer sous WordPress.
    remove_action('wp_head', 'wlwmanifest_link');
    // Bloquez les requêtes pour obtenir l’identifiant dans l’URL
    // Suppression du login admin des commentaires
    add_filter( 'comment_class' , 'remove_comment_author_class' );
    // pour les flux RSS
    add_feed('rss2', 'create_my_custom_feed');
    // désactiver les commentaires
    add_filter('comments_open', 'wpc_comments_closed', 10, 2);
    // désactivation de l'autocmpletion de modules-templates
    add_action('login_enqueue_scripts', 'kill_autocompletion');



	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Menu principal', 'webtransition' ),
		'secondary' => __( 'Menu secondaire', 'webtransition' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );



	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css' ) );

}
endif; // webtransition_setup
add_action( 'after_setup_theme', 'webtransition_setup' );

/* Autoriser l'upload de tous types de format dans les médias */

add_filter('upload_mimes', 'wpm_myme_types', 1, 1);

function wpm_myme_types($mime_types){
    $mime_types['mpeg'] = 'video/mpeg'; //On autorise les .mpeg
    return $mime_types;
}

/**
 * ACF Editor : Adding Specific styles to ACF Fields (via data-id)
 * use 
 *
 */

 function add_class_to_my_tab1($field) {
	$field['id'] = 'nakaa-customer';
	//echo '<pre>'; print_r($field); echo '</pre>';
    return $field;
  }
add_filter('acf/load_field/key=field_58cc1e7b82e9f', 'add_class_to_my_tab1');

 function add_class_to_my_tab2($field) {
	$field['id'] = 'nakaa-quisommesnous';
	//echo '<pre>'; print_r($field); echo '</pre>';
    return $field;
  }
add_filter('acf/load_field/key=field_58cfc79097590', 'add_class_to_my_tab2');

 function add_class_to_my_tab3($field) {
	$field['id'] = 'nakaa-approche';
	//echo '<pre>'; print_r($field); echo '</pre>';
    return $field;
  }
add_filter('acf/load_field/key=field_58cfccd9511f8', 'add_class_to_my_tab3');
  
  
  

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function webtransition_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'webtransition' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'webtransition' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'webtransition_widgets_init' );



/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function webtransition_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'webtransition_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 */
function webtransition_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'webtransition-style', get_template_directory_uri(). "/styles/styles.min.css");

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'webtransition-ie', get_template_directory_uri() . '/css/ie.css', array( 'webtransition-style' ), '20160412' );
	wp_style_add_data( 'webtransition-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'webtransition-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'webtransition-style' ), '20160412' );
	wp_style_add_data( 'webtransition-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'webtransition-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'webtransition-style' ), '20160412' );
	wp_style_add_data( 'webtransition-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'webtransition-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'webtransition-html5', 'conditional', 'lt IE 9' );


	// wp_enqueue_script( 'webtransition-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160412', true );
	wp_enqueue_script( 'webtransition-script', get_template_directory_uri() . '/vendors/nakaa-sticky-header/nakaa-sh.js', array( 'jquery' ), '20170503', true );

}
add_action( 'wp_enqueue_scripts', 'webtransition_scripts' );

function Max_Decourtray_charger_css_js_admin() {

    wp_enqueue_style(

        'Max_Decourtray-admin-css',

        get_stylesheet_directory_uri() . '/styles/admin.css'

    );

 

    wp_enqueue_script(

        'Max_Decourtray-admin-js',

        get_stylesheet_directory_uri() . '/scripts/admin.js'

    );

}

 

add_action( 'admin_enqueue_scripts', 'Max_Decourtray_charger_css_js_admin' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function webtransition_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

	/*******************************************************************************
	*
	*      IMAGES SIZES
	*
	*******************************************************************************/
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'actus-img', 945, 520, false ); //(scaled)
	add_image_size( 'customer-img', 585, 480, true ); //(scaled)
	add_image_size( 'thumb-actus-img', 358, 202, true ); //(cropped)
	add_image_size( 'xs-img', 163, 163, true ); //(cropped)
	add_image_size( 'xxs-img', 156, 156, true ); //(cropped)
	//add_image_size( 'personnel-img', 162, 162, true ); //(cropped)
	//add_image_size( 'realisations-thumb-img', 98, 74, true ); //(scaled)
	//add_image_size( 'portfolio-img', 1000, 600, false ); //(scaled)
//	add_image_size( 'portfolio-cropped-img', 400, 267, true ); //(cropped)
//	add_image_size( 'realisations-avant-trav-img', 255, 215, true ); //(cropped)
//	add_image_size( 'contact-bg-img', 585, 900, true ); //(cropped)
//	add_image_size( 'portfolio-hp-img', 372, 246, true ); //(cropped)
	// add_image_size( 'portfolio-img', 770, 120, true ); //(cropped)
	// add_image_size( 'member-img', 200, 200, false ); //(scaled)
	// add_image_size( 'people-img', 360, 360, true ); //(cropped)
	// add_image_size( 'people-featured-img', 150, 120, true ); //(cropped)
}

	/*******************************************************************************
	*
	*      CUSTOM POSTS (PORTFOLIO et REALISATION)
	*
	*******************************************************************************/
// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Clients', 'Post Type General Name', 'webtransition' ),
		'singular_name'         => _x( 'Client', 'Post Type Singular Name', 'webtransition' ),
		'menu_name'             => __( 'Clients', 'webtransition' ),
		'name_admin_bar'        => __( 'Client', 'webtransition' ),
		'archives'              => __( 'Archives des Clients', 'webtransition' ),
		'parent_item_colon'     => __( 'Client parent:', 'webtransition' ),
		'all_items'             => __( 'Tous les Clients', 'webtransition' ),
		'add_new_item'          => __( 'Nouveau Client', 'webtransition' ),
		'add_new'               => __( 'Ajouter', 'webtransition' ),
		'new_item'              => __( 'Nouveau Client', 'webtransition' ),
		'edit_item'             => __( 'Editer Client', 'webtransition' ),
		'update_item'           => __( 'Mettre à jour Client', 'webtransition' ),
		'view_item'             => __( 'Voir Client', 'webtransition' ),
		'search_items'          => __( 'Chercher Client', 'webtransition' ),
		'not_found'             => __( 'Non trouvé', 'webtransition' ),
		'not_found_in_trash'    => __( 'Non trouvé dans la corbeille', 'webtransition' ),
		'featured_image'        => __( 'Featured Image', 'webtransition' ),
		'set_featured_image'    => __( 'Set featured image', 'webtransition' ),
		'remove_featured_image' => __( 'Remove featured image', 'webtransition' ),
		'use_featured_image'    => __( 'Use as featured image', 'webtransition' ),
		'insert_into_item'      => __( 'Insert into Client', 'webtransition' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Client', 'webtransition' ),
		'items_list'            => __( 'Liste des Clients', 'webtransition' ),
		'items_list_navigation' => __( 'Clients list navigation', 'webtransition' ),
		'filter_items_list'     => __( 'Filtrer les Clients', 'webtransition' ),
	);
	$args = array(
		'label'                 => __( 'Client', 'webtransition' ),
		'description'           => __( 'Client', 'webtransition' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'page-attributes', ),
		'taxonomies'            => array( 'category_client' ),
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
		'capability_type'       => 'post',
	);
	register_post_type( 'client', $args );

		/*$labels = array(
		'name'                  => _x( 'Annonces', 'Post Type General Name', 'webtransition' ),
		'singular_name'         => _x( 'Annonce', 'Post Type Singular Name', 'webtransition' ),
		'menu_name'             => __( 'Annonces', 'webtransition' ),
		'name_admin_bar'        => __( 'Annonce', 'webtransition' ),
		'archives'              => __( 'Archives des Annonces', 'webtransition' ),
		'parent_item_colon'     => __( 'Annonce parent:', 'webtransition' ),
		'all_items'             => __( 'Tous les Annonces', 'webtransition' ),
		'add_new_item'          => __( 'Nouveau Annonce', 'webtransition' ),
		'add_new'               => __( 'Ajouter', 'webtransition' ),
		'new_item'              => __( 'Nouveau Annonce', 'webtransition' ),
		'edit_item'             => __( 'Editer Annonce', 'webtransition' ),
		'update_item'           => __( 'Mettre à jour Annonce', 'webtransition' ),
		'view_item'             => __( 'Voir Annonce', 'webtransition' ),
		'search_items'          => __( 'Chercher Annonce', 'webtransition' ),
		'not_found'             => __( 'Non trouvé', 'webtransition' ),
		'not_found_in_trash'    => __( 'Non trouvé dans la corbeille', 'webtransition' ),
		'featured_image'        => __( 'Featured Image', 'webtransition' ),
		'set_featured_image'    => __( 'Set featured image', 'webtransition' ),
		'remove_featured_image' => __( 'Remove featured image', 'webtransition' ),
		'use_featured_image'    => __( 'Use as featured image', 'webtransition' ),
		'insert_into_item'      => __( 'Insert into Annonce', 'webtransition' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Annonce', 'webtransition' ),
		'items_list'            => __( 'Liste des Annonces', 'webtransition' ),
		'items_list_navigation' => __( 'Annonces list navigation', 'webtransition' ),
		'filter_items_list'     => __( 'Filtrer les Annonces', 'webtransition' ),
	);
	$args = array(
		'label'                 => __( 'Annonce', 'webtransition' ),
		'description'           => __( 'Annonce', 'webtransition' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'page-attributes', ),
		'taxonomies'            => array( 'category_annonce' ),
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
		'capability_type'       => 'post',
	);
	register_post_type( 'annonce', $args );
*/
flush_rewrite_rules();
}
add_action( 'init', 'custom_post_type', 0 );


// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Catégories', 'Taxonomy General Name', 'webtransition' ),
		'singular_name'              => _x( 'Catégorie', 'Taxonomy Singular Name', 'webtransition' ),
		'menu_name'                  => __( 'Catégorie', 'webtransition' ),
		'all_items'                  => __( 'Toutes les Catégories', 'webtransition' ),
		'parent_item'                => __( 'Catégorie parente', 'webtransition' ),
		'parent_item_colon'          => __( 'Catégorie parente:', 'webtransition' ),
		'new_item_name'              => __( 'Nouveau nom de Catégorie', 'webtransition' ),
		'add_new_item'               => __( 'Nouvelle Catégorie', 'webtransition' ),
		'edit_item'                  => __( 'Editer la Catégorie', 'webtransition' ),
		'update_item'                => __( 'Mettre à jour la Catégorie', 'webtransition' ),
		'view_item'                  => __( 'Voir la Catégorie', 'webtransition' ),
		'separate_items_with_commas' => __( 'Séparez les catégories par une virgule', 'webtransition' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'webtransition' ),
		'choose_from_most_used'      => __( 'Choisir parmi les plus populaires', 'webtransition' ),
		'popular_items'              => __( 'Popular Items', 'webtransition' ),
		'search_items'               => __( 'Chercher une Catégorie', 'webtransition' ),
		'not_found'                  => __( 'Non trouvé', 'webtransition' ),
		'no_terms'                   => __( 'Pas de Catégorie', 'webtransition' ),
		'items_list'                 => __( 'Liste des Catégories', 'webtransition' ),
		'items_list_navigation'      => __( 'Items list navigation', 'webtransition' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'category_annonce', array( 'annonce' ), $args );
	flush_rewrite_rules();
}
add_action( 'init', 'custom_taxonomy', 0 );

	/*******************************************************************************
	*
	*      CHARGEMENT AJAX DES PORTFOLIOS
	*
	*******************************************************************************/
/*

add_action("wp_ajax_my_user_vote", "mon_portfolio");
add_action("wp_ajax_nopriv_my_user_vote", "mon_portfolio");

function mon_portfolio() {
    $pid        = intval($_GET['post_id']);
	echo $pid;
    $the_query  = new WP_Query(array('p' => $pid, 'post_type'		=> 'portfolio',));

    if ($the_query->have_posts()) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();

            get_template_part( 'template-parts/content', 'portfolio' );

        }
    }
    else {
        echo '<div id="postdata">'.__('Didnt find anything', THEME_NAME).'</div>';
    }
    wp_reset_postdata();


    echo '<div id="postdata">'.$data.'</div>';
	 die();
}
*/
	/*******************************************************************************
	*
	*      MENU NAV
	*
	*******************************************************************************/
 class webtransition_Nav_Walker	 extends Walker_Nav_Menu {
        function start_lvl( &$output, $depth=0, $args=array() ) {
          if ( $depth == 0 ) {
            $output .= '<ul class="sub-menu">';
          } else if ( $depth == 1 ) {
            $output .= '<ul class="third-menu">';
          }
        }
        function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
          $id_field = $this->db_fields['id'];
          if ( is_object( $args[0] ) ) {
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
          }
          return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
        }
        function start_el( &$output, $object, $depth=0, $args=array(), $current_object_id=0 ) {
          global $wp_query;
          global $rb_submenus;
          $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
          $new_output = '';
          $depth_class = ( $args->has_children ? 'parent ' : '' );
          $class_names = $value = $selected_class = '';
          $classes = empty( $object->classes ) ? array() : ( array ) $object->classes;
          $current_indicators = array('current-menu-item', 'current-menu-parent', 'current_page_item', 'current_page_parent', 'current-menu-ancestor');
          foreach ( $classes as $el ) {
            if ( in_array( $el, $current_indicators ) ) {
              $selected_class = 'current-menu-item ';
            }
          }
		  //$class_names = ' class="' . $selected_class . $depth_class . 'menu-item' . ( ! empty( $classes[0] ) ? ' ' . $classes[1] : '' ) . '"';
		  $classes_saisies = (!empty($classes)) ? " " . implode(" ", $classes) : "";
		  $class_names = ' class="' . $selected_class . $depth_class . 'menu-item' . ' ' . $classes_saisies  . '"';
          if ( ! get_post_meta( $object->object_id , '_members_only' , true ) || is_user_logged_in() ) {
            // $output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $class_names . '>';
            $output .= $indent . '<li ' . $class_names . '>';
          }

          $object_output = $args->before;
          if(empty( $object->url ) or $object->url =="#"){
            $object_output .= '<span>';
            $object_output .= $args->link_before . apply_filters( 'the_title', $object->title, $object->ID ) . $args->link_after;
            $object_output .= '<i></i></span>';
          }
          else{
            $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
            $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
            $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
            $attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';

            $object_output .= '<span><a' . $attributes . '>';
            $object_output .= $args->link_before . apply_filters( 'the_title', $object->title, $object->ID ) . $args->link_after;
            $object_output .= '</a><s></s></span>';
          }

          $object_output .= $args->after;

          if ( !get_post_meta( $object->object_id, '_members_only' , true ) || is_user_logged_in() ) {
            $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
          }

          $output .= $new_output;
        }

        function end_el(&$output, $object, $depth=0, $args=array()) {
          if ( !get_post_meta( $object->object_id, '_members_only' , true ) || is_user_logged_in() ) {
            $output .= "</li>\n";
          }
        }

        function end_lvl(&$output, $depth=0, $args=array()) {
          $output .= "</ul>\n";
        }
      }

		/*******************************************************************************
      *
      *      FONCTIONS FORMULAIRE NEWSLETTER
      *
      *******************************************************************************/
      // remplacement du input[type=submit] de cf7 par un élément <button>
      // http://www.featheredowl.com/contact-form-7-submit-button-element/
      function wtmw_wpcf7_submit_button() {
        if(function_exists('wpcf7_remove_shortcode')) { /* wpcf7_remove_form_tag */
          wpcf7_remove_shortcode('submit');
          remove_action( 'admin_init', 'wpcf7_add_tag_generator_submit', 55 );
          $wtmw_cf7_module = TEMPLATEPATH . '/cf7/submit-button.php';
          require_once $wtmw_cf7_module;
        }
      }
      add_action('after_setup_theme','wtmw_wpcf7_submit_button');

      add_action( 'wp_enqueue_scripts', 'wtmw_remove_cf7_scripts' );

      // suppression des CSS de CF7 sur toutes les pages et des scripts de CF7 sur toutes les pages autres que la page newsletter
      function wtmw_remove_cf7_scripts() {
        wp_deregister_style( 'contact-form-7' );
        if ( !is_page('contact') ) {
          wp_deregister_script( 'contact-form-7' );
        }
      }
	  
	  add_filter('wpcf7_form_elements', function($content) {
		  // suppression du wrapper <span>
			$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
			$content = preg_replace('/<div .*?class="(.*?)">(.*?)<\/div>/','<span class="$1">$2</span>',$content);
		  // Ajout du label sur le modèle placeholder 
			$content = preg_replace('/placeholder="(.*)"/i', 'placeholder="\1" label="\1"', $content);
			return $content;
		});
		
	function cf7_add_custom_class($error) {
		$error=str_replace("class=\"","class=\"MyClass1 MyClass2 ", $error);
		return $error;
		}
		add_filter('wpcf7_validation_error', 'cf7_add_custom_class');
	  
	 /*******************************************************************************
      *
      *      FONCTIONS TEMPLATE HELPER
      *
      *******************************************************************************/
		  
		  
	// permet le chargement d'un template dans une variable
	if( ! function_exists('load_template_part') ){
	  function load_template_part($template_name, $part_name=null) {
		ob_start();
		get_template_part($template_name, $part_name);
		$var = ob_get_contents();
		ob_end_clean();
		return $var;
	  }
	}



	/**
	* Theme View.
	*/
	if ( ! class_exists('Nakaa_ThemeView') ) {
	  class Nakaa_ThemeView{
		private $args;
		private $file;

		public function __get($name) {
		  return $this->args[$name];
		}

		public function __construct($file, $args = array()) {
		  $this->file = $file;
		  $this->args = $args;
		}

		public function __isset($name){
		  return isset( $this->args[$name] );
		}

		public function render() {
		  if( locate_template($this->file) ){
			include( locate_template($this->file) );//Theme Check free. Child themes support.
		  }
		}
	  }
	}
	/*
	* Fonction permettant de passer des paramètres à un fichier de template
	* wtmw_get_template_part('filename.php', array(
	*    'variable_1' => 'Content',
	*    'other_variable' => 'Other content'
	* ));
	*
	* Utilisation dans le template:
	* echo $this->variable_1; // Output `Content`
	* echo $this->other_variable; // Output `Other content`
	*/
	if( ! function_exists('nakaa_get_template_part') ){
	  function nakaa_get_template_part($file, $args = array()){
		$template = new Nakaa_ThemeView($file, $args);
		$template->render();
	  }
	}
	/*******************************************************************************
	*
	*      ADMINISTRATION - STYLES (LOGIN)
	*
	*******************************************************************************/

	// Changement du texte de la balise alt du titre
	function my_loginURLtext() {
		return 'webtransition - Administration';
	}
	add_filter('login_headertitle', 'my_loginURLtext');

	// chargement de la feuille de style spécifique
	function my_logincustomCSSfile() {
		wp_enqueue_style('login-styles', get_template_directory_uri() . '/admin/login.css');
	}
	add_action('login_enqueue_scripts', 'my_logincustomCSSfile');


	/*******************************************************************************
	*
	*      ADMINISTRATION - MENUS
	*
	*******************************************************************************/
/**
 * AdminBar (en haut).
 */
function edit_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo'); // Logo
    $wp_admin_bar->remove_menu('about'); // A propos de WordPress
    $wp_admin_bar->remove_menu('wporg'); // WordPress.org
    $wp_admin_bar->remove_menu('documentation'); // Documentation
    $wp_admin_bar->remove_menu('support-forums');  // Forum de support
    $wp_admin_bar->remove_menu('feedback'); // Remarque
    // $wp_admin_bar->remove_menu('view-site'); // Aller voir le site
    $wp_admin_bar->remove_menu('comments'); // Commentaires
	//$wp_admin_bar->remove_menu('new-post'); // Créer un post
	$wp_admin_bar->remove_menu('new-media'); // Créer un média
	$wp_admin_bar->remove_menu('bar-blog-1-n'); // Ajouter un article à un blog

	// Différenciation de l'affichage en fonction du type d'utilisateur
	global $current_user;
	$cuser_role = (isset($current_user->roles[0]))? $current_user->roles[0]: false;
	if(!$cuser_role)
		return;
	else{
		if($cuser_role=='administrator'){

		}
		else{
			// si l'utilisateur n'est pas administrateur
			$wp_admin_bar->remove_menu('my-sites');
		}
	}
}
add_action('wp_before_admin_bar_render', 'edit_admin_bar');

/**
 * AdminMenu (à gauche).
 */
function remove_menu_pages() {
	// remove_menu_page( 'index.php' );                 //Dashboard
	// remove_menu_page( 'upload.php' );                //Media
	// remove_menu_page( 'edit.php?post_type=page' );   //Pages
	remove_menu_page( 'edit-comments.php' );          	//Comments
	//remove_menu_page('edit.php');
	remove_menu_page('edit.php?post_type=acf'); 		// Advanced Custom Fields
	// remove_menu_page('wpcf7'); // Contact form 7
	// remove_menu_page('wpseo_dashboard'); // SEO by Yoast
	// remove_menu_page( 'themes.php' );                //Appearance
	// remove_menu_page( 'plugins.php' );               //Plugins
	// remove_menu_page( 'users.php' );                 //Users
	// remove_menu_page( 'tools.php' );                 //Tools
	// remove_menu_page( 'options-general.php' );       //Settings




	// Différenciation de l'affichage en fonction du type d'utilisateur
	global $current_user;
	$cuser_role = (isset($current_user->roles[0]))? $current_user->roles[0]: false;
	if(!$cuser_role)
		return;
	else{
		if($cuser_role=='administrator'){

		}
		else{
			// si l'utilisateur n'est pas administrateur
			// remove_menu_page( 'index.php' );                  	//Dashboard
			remove_menu_page( 'upload.php' );                 	//Media
			remove_menu_page('wpcf7'); 							// Contact form 7
			remove_menu_page( 'tools.php' );                 	//Tools

			// S'il s'agit du site Okaidi.com (hub), alors on n'affiche pas les déclinaisons de posts
			/*if(get_current_blog_id() == 1){
				remove_menu_page('edit.php?post_type=decli_page_hp');
				remove_menu_page('edit.php?post_type=decli_page_marque');
				remove_menu_page('edit.php?post_type=decli_page_collec');
				remove_menu_page('edit.php?post_type=decli_page_fidel');
				remove_menu_page('edit.php?post_type=decli_page_news');
				remove_menu_page('edit.php?post_type=decli_page_mentions');
				remove_menu_page('edit.php?post_type=decli_page_confid');
				remove_menu_page('edit.php?post_type=decli_page_histo');
			}*/
		}
	}

}
add_action( 'admin_menu', 'remove_menu_pages' );

/**
 * Suppression des widgets par défaut
 */

function remove_dashboard_meta() {
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8

}
add_action( 'admin_init', 'remove_dashboard_meta' );

/**
 * Ajout de la gestion des champs ACF Options
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

/****Maxime Decourtray Ajout custom post type recrutement ***/

function cpt_init() {
$labels = array(
'name' => 'recrutement',
'singular_name' => 'poste',
'add_new' => 'Ajouter un poste',
'add_new_item' => 'Ajouter un poste',
'edit_item' => 'Modifier le poste',
'new_item' => 'Nouveau poste',
'all_items' => 'Tous les postes',
'view_item' => 'Voir le poste',
'search_items' => 'Chercher un poste',
'not_found' => 'Aucun poste trouvé',
'not_found_in_trash' => 'Aucun poste trouvé dans la corbeille',
'parent_item_colon' => '',
'menu_name' => 'Recrutement'
);
$args = array(
'labels' => $labels,
'description' => 'Description du post type poste',
'public' => true,
'publicly_queryable' => true,
'show_ui' => true,
'show_in_menu' => true,
'query_var' => true,
'rewrite' => array( 'slug' => 'postes' ),
'capability_type' => 'post',
'has_archive' => true,
'hierarchical' => false,
'menu_position' => null,
'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt')
);
register_taxonomy( 'typeposte', 'postes', array( 'hierarchical' => true, 'label' => 'Métier', 'query_var' => true, 'rewrite' => true ) );
register_taxonomy( 'lieuposte', 'postes', array( 'hierarchical' => true, 'label' => 'Localisation', 'query_var' => true, 'rewrite' => true ) );
register_taxonomy( 'profilposte', 'postes', array( 'hierarchical' => true, 'label' => 'Profil du poste', 'query_var' => true, 'rewrite' => true ) );
register_post_type('postes', $args );

}
add_action('init', 'cpt_init');


function the_excerpt_max_charlength($charlength) {
$excerpt = get_the_excerpt();
$charlength++;

if ( mb_strlen( $excerpt ) > $charlength ) {
$subex = mb_substr( $excerpt, 0, $charlength - 5 );
$exwords = explode( ' ', $subex );
$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
if ( $excut < 0 ) {
echo mb_substr( $subex, 0, $excut );
} else {
echo $subex;
}
echo '...';
} else {
echo $excerpt;
}
}

/****Fin Maxime Decourtray Ajout custom post type recrutement ***/

