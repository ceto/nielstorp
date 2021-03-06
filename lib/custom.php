<?php
define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
define('ICL_DONT_LOAD_LANGUAGES_JS', true);

add_action( 'init', 'nt_project_init' );
/**
 * Register a project post type and its taxonomy.
 *
 */
function nt_project_init() {
	$labels = array(
		'name'               => _x( 'Projects', 'post type general name', 'nielstorp' ),
		'singular_name'      => _x( 'Project', 'post type singular name', 'nielstorp' ),
		'menu_name'          => _x( 'Projects', 'admin menu', 'nielstorp' ),
		'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'nielstorp' ),
		'add_new'            => _x( 'Add New', 'Project', 'nielstorp' ),
		'add_new_item'       => __( 'Add New Project', 'nielstorp' ),
		'new_item'           => __( 'New Project', 'nielstorp' ),
		'edit_item'          => __( 'Edit Project', 'nielstorp' ),
		'view_item'          => __( 'View Project', 'nielstorp' ),
		'all_items'          => __( 'All Projects', 'nielstorp' ),
		'search_items'       => __( 'Search Projects', 'nielstorp' ),
		'parent_item_colon'  => __( 'Parent Projects:', 'nielstorp' ),
		'not_found'          => __( 'No Projects found.', 'nielstorp' ),
		'not_found_in_trash' => __( 'No Projects found in Trash.', 'nielstorp' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'project' ),
		'capability_type'    => 'post',
		'has_archive'        => 'projects',
		'hierarchical'       => false,
		'menu_position'      => null,
		'yarpp_support'			 => true,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'project', $args );
}


/******** Change Feat Image Label on project pages ******/
add_action('do_meta_boxes', 'nt_proj_image_box');
function nt_proj_image_box() {
	remove_meta_box( 'postimagediv', 'project', 'side' );
  add_meta_box('postimagediv', __('Project Thumbnail<br>(min.: 768×768px)','nielstorp'), 'post_thumbnail_meta_box', 'project', 'side', 'high');
}


add_action( 'init', 'nt_project_taxonomies', 0 );
function nt_project_taxonomies() {
	$labels = array(
		'name'              => _x( 'Project Categories', 'taxonomy general name','nielstorp' ),
		'singular_name'     => _x( 'Project Category', 'taxonomy singular name','nielstorp' ),
		'search_items'      => __( 'Search Project Categories','nielstorp' ),
		'all_items'         => __( 'All Project Categories','nielstorp' ),
		'parent_item'       => __( 'Parent Project Category','nielstorp' ),
		'parent_item_colon' => __( 'Parent Project Category:','nielstorp' ),
		'edit_item'         => __( 'Edit Project Category','nielstorp' ),
		'update_item'       => __( 'Update Project Category','nielstorp' ),
		'add_new_item'      => __( 'Add New Project Category','nielstorp' ),
		'new_item_name'     => __( 'New Project category Name','nielstorp' ),
		'menu_name'         => __( 'Project 	Categories','nielstorp' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'project-category' ),
	);

	register_taxonomy( 'projects', array( 'project' ), $args );
}


/************ Project MetaBoxes **********/

if ( file_exists(  __DIR__ .'/CMB2/init.php' ) ) { require_once  __DIR__ .'/CMB2/init.php';};

// function cmb2_hide_if_no_cats( $field ) {
// 	if ( ! has_tag( 'cats', $field->object_id ) ) {
// 		return false;
// 	}
// 	return true;
// }


add_filter( 'cmb2_meta_boxes', 'nt_project_metaboxes' );
function nt_project_metaboxes( array $meta_boxes ) {
	$prefix = '_pdata_';
	$meta_boxes['project_metabox'] = array(
		'id'            => 'project_metabox',
		'title'         => __( 'Project details', 'nielstorp' ),
		'object_types'  => array( 'project', 'competition', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		'fields'        => array(
			array(
				'name' => __( 'Subtitle', 'nielstorp' ),
				'id'   => $prefix . 'subtitle',
				'type' => 'text',
			),
			array(
				'name' => __( 'Location', 'nielstorp' ),
				'id'   => $prefix . 'location',
				'type' => 'text',
			),
			array(
				'name' => __( 'Size', 'nielstorp' ),
				'id'   => $prefix . 'size',
				'type' => 'text_small',
			),
			array(
				'name' => __( 'Client', 'nielstorp' ),
				'id'   => $prefix . 'client',
				'type' => 'text_medium',
			),
			array(
				'name' => __( 'Client URL', 'nielstorp' ),
				'desc' => __( 'add a url to clients website if exists', 'nielstorp' ),
				'id'   => $prefix . 'clienturl',
				'type' => 'text_url',
				// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
			),
			array(
				'name' => __( 'Recognition', 'nielstorp' ),
				'id'   => $prefix . 'recognition',
				'type' => 'text',
			),
			array(
				'name' => __( 'Built year', 'nielstorp' ),
				'id'   => $prefix . 'built',
				'type' => 'text_small',
			),
			array(
				'name' => __( 'Project video', 'nielstorp' ),
				'desc' => __( 'add a youtube/vimeo url (first slide in gallery)', 'nielstorp' ),
				'id'   => $prefix . 'video',
				'type' => 'text_url',
			),
			array(
				'name' => __( 'Video start image', 'nielstorp' ),
				'desc' => __( 'add a cover/start image for the video above (same aspect ratio)', 'nielstorp' ),
				'id'   => $prefix . 'videoimg',
				'type' => 'file',
			),
			array(
				'name' => 'Photo Gallery',
				'desc' => 'Add some high resolution project photo. You can select multiple files from the popup',
				'id' => $prefix . 'gallery',
				'type' => 'file_list',
				'preview_size' => array( 160, 90 ),
			),

		),
	);

	return $meta_boxes;
};



/*** Timeline Boxes ***/
add_filter( 'cmb2_meta_boxes', 'nt_timeline_metaboxes' );
function nt_timeline_metaboxes( array $meta_boxes ) {
  $prefix = '_data_';
  $meta_boxes['timeline_metabox'] = array(
      'id'            => 'timeline_metabox',
      'title'         => __( 'Page Details', 'cmb2' ),
      'object_types'  => array( 'page', ), // Post type
      'show_on'      => array( 'key' => 'page-template', 'value' => 'template-timeline.php' ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true, // Show field names on the left
      // 'cmb_styles' => false, // false to disable the CMB stylesheet
      // 'closed'     => true, // Keep the metabox closed by default
      'fields'        => array(
        array(
            'id'          => $prefix . 'timeline',
            'type'        => 'group',
            'description' => __( 'Manage Your Timeline', 'cmb' ),
            'options'     => array(
                'group_title'   => __( 'Timeline element {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
                'add_button'    => __( 'Add another element', 'cmb' ),
                'remove_button' => __( 'Remove element', 'cmb' ),
                'sortable'      => true, // beta
            ),
            // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
            'fields'      => array(
                array(
                    'name' => 'Element Title',
                    'id'   => 'title',
                    'type' => 'text',
                    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
                ),
                array(
                    'name' => 'Content',
                    'description' => 'Add any content you want',
                    'id'   => 'content',
                    'type' => 'wysiwyg',
                    'options'    => array (
                      'wpautop' => true,
                      'media_buttons' => false,
                      'textarea_rows' => get_option('default_post_edit_rows', 5),
                      'teeny' => true,
                    ),
                ),
                array(
                    'name' => 'Date',
                    'id'   => 'date',
                    'type' => 'text_date_timestamp',
                ),
								array(
									'name' => 'Add an Image',
									'desc' => 'Upload an image or enter an URL.',
									'id' => 'image',
									'type' => 'file',
									"options" => array(
											"url" => false
										)
								),

            ),
        ), /* end of group def*/



      ),
  );

	return $meta_boxes;
};




/********* About US Meta Boxes **********/
/*** Timeline Boxes ***/
add_filter( 'cmb2_meta_boxes', 'nt_aboutus_metaboxes' );
function nt_aboutus_metaboxes( array $meta_boxes ) {
  $prefix = '_data_';
  $meta_boxes['aboutus_metabox'] = array(
      'id'            => 'aboutus_metabox',
      'title'         => __( 'About Us Page Details', 'cmb2' ),
      'object_types'  => array( 'page', ), // Post type
      'show_on'      => array( 'key' => 'page-template', 'value' => 'template-aboutus.php' ),
      'context'       => 'normal',
      'priority'      => 'high',
      'show_names'    => true, // Show field names on the left
      // 'cmb_styles' => false, // false to disable the CMB stylesheet
      // 'closed'     => true, // Keep the metabox closed by default
      'fields'        => array(
				array(
					'name' => 'Team Photos at the Top',
					'desc' => 'Photos title must be filled. You can select multiple files from the popup.',
					'id' => $prefix . 'timeline',
					'type' => 'file_list',
					'preview_size' => array( 160, 90 ),
				),
				array(
					'name' => 'Random Photos Below',
					'desc' => 'Add some high resolution photo.',
					'id' => $prefix . 'gallery',
					'type' => 'file_list',
					'preview_size' => array( 160, 160 ),
				),

      ),
  );

	return $meta_boxes;
};







/****** Competition ********/

add_action( 'init', 'nt_competition_init' );
/**
 * Register a competition post type and its taxonomy.
 *
 */
function nt_competition_init() {
	$labels = array(
		'name'               => _x( 'Competitions', 'post type general name', 'nielstorp' ),
		'singular_name'      => _x( 'Competition', 'post type singular name', 'nielstorp' ),
		'menu_name'          => _x( 'Competitions', 'admin menu', 'nielstorp' ),
		'name_admin_bar'     => _x( 'Competition', 'add new on admin bar', 'nielstorp' ),
		'add_new'            => _x( 'Add New', 'Competition', 'nielstorp' ),
		'add_new_item'       => __( 'Add New Competition', 'nielstorp' ),
		'new_item'           => __( 'New Competition', 'nielstorp' ),
		'edit_item'          => __( 'Edit Competition', 'nielstorp' ),
		'view_item'          => __( 'View Competition', 'nielstorp' ),
		'all_items'          => __( 'All Competitions', 'nielstorp' ),
		'search_items'       => __( 'Search Competitions', 'nielstorp' ),
		'parent_item_colon'  => __( 'Parent Competitions:', 'nielstorp' ),
		'not_found'          => __( 'No Competitions found.', 'nielstorp' ),
		'not_found_in_trash' => __( 'No Competitions found in Trash.', 'nielstorp' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'competition' ),
		'capability_type'    => 'post',
		'has_archive'        => 'competitions',
		'hierarchical'       => false,
		'menu_position'      => null,
		'yarpp_support'			 => true,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'competition', $args );
}


/******** Change Feat Image Label on project pages ******/
add_action('do_meta_boxes', 'nt_comp_image_box');
function nt_comp_image_box() {
	remove_meta_box( 'postimagediv', 'competition', 'side' );
  add_meta_box('postimagediv', __('Competition Thumbnail<br>(min.: 768×768px)','nielstorp'), 'post_thumbnail_meta_box', 'competition', 'side', 'high');
}


add_action( 'init', 'nt_comp_taxonomies', 0 );
function nt_comp_taxonomies() {
	$labels = array(
		'name'              => _x( 'Competion Categories', 'taxonomy general name','nielstorp' ),
		'singular_name'     => _x( 'Competion Category', 'taxonomy singular name','nielstorp' ),
		'search_items'      => __( 'Search Competion Categories','nielstorp' ),
		'all_items'         => __( 'All Competion Categories','nielstorp' ),
		'parent_item'       => __( 'Parent Competion Category','nielstorp' ),
		'parent_item_colon' => __( 'Parent Competion Category:','nielstorp' ),
		'edit_item'         => __( 'Edit Competion Category','nielstorp' ),
		'update_item'       => __( 'Update Competion Category','nielstorp' ),
		'add_new_item'      => __( 'Add New Competion Category','nielstorp' ),
		'new_item_name'     => __( 'New Competion category Name','nielstorp' ),
		'menu_name'         => __( 'Competion 	Categories','nielstorp' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'competition-category' ),
	);

	register_taxonomy( 'competitions', array( 'competition' ), $args );
}


/**
 * Register an employee post type
 *
 */

add_action( 'init', 'nt_employee_init' );
function nt_employee_init() {
	$labels = array(
		'name'               => _x( 'Employees', 'post type general name', 'nielstorp' ),
		'singular_name'      => _x( 'Employee', 'post type singular name', 'nielstorp' ),
		'menu_name'          => _x( 'Employees', 'admin menu', 'nielstorp' ),
		'name_admin_bar'     => _x( 'Employee', 'add new on admin bar', 'nielstorp' ),
		'add_new'            => _x( 'Add New', 'Employee', 'nielstorp' ),
		'add_new_item'       => __( 'Add New Employee', 'nielstorp' ),
		'new_item'           => __( 'New Employee', 'nielstorp' ),
		'edit_item'          => __( 'Edit Employee', 'nielstorp' ),
		'view_item'          => __( 'View Employee', 'nielstorp' ),
		'all_items'          => __( 'All Employees', 'nielstorp' ),
		'search_items'       => __( 'Search Employees', 'nielstorp' ),
		'parent_item_colon'  => __( 'Parent Employees:', 'nielstorp' ),
		'not_found'          => __( 'No Employees found.', 'nielstorp' ),
		'not_found_in_trash' => __( 'No Employees found in Trash.', 'nielstorp' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'employee' ),
		'capability_type'    => 'post',
		'has_archive'        => 'employees',
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail', 'custom-fields' )
	);

	register_post_type( 'employee', $args );
}


/******** Change Feat Image Label on Employee pages ******/
add_action('do_meta_boxes', 'nt_empl_image_box');
function nt_empl_image_box() {
	remove_meta_box( 'postimagediv', 'employee', 'side' );
  add_meta_box('postimagediv', __('Employee photo<br>(min.: 480×480px)','nielstorp'), 'post_thumbnail_meta_box', 'employee', 'side', 'high');
}

/************ Department Taxonomy for employee management **********/
add_action( 'init', 'nt_employee_taxonomies', 0 );
function nt_employee_taxonomies() {
	$labels = array(
		'name'              => _x( 'Departments', 'taxonomy general name','nielstorp' ),
		'singular_name'     => _x( 'Department', 'taxonomy singular name','nielstorp' ),
		'search_items'      => __( 'Search Departments','nielstorp' ),
		'all_items'         => __( 'All Departments','nielstorp' ),
		'edit_item'         => __( 'Edit Department','nielstorp' ),
		'update_item'       => __( 'Update Department','nielstorp' ),
		'add_new_item'      => __( 'Add New Department','nielstorp' ),
		'new_item_name'     => __( 'New Department Name','nielstorp' ),
		'menu_name'         => __( 'Departments','nielstorp' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'department' ),
	);

	register_taxonomy( 'department', array( 'employee' ), $args );
}



/************ Employee MetaBoxes **********/


add_filter( 'cmb2_meta_boxes', 'nt_employee_metaboxes' );
function nt_employee_metaboxes( array $meta_boxes ) {
	$prefix = '_edata_';
	$meta_boxes['employee_metabox'] = array(
		'id'            => 'employee_metabox',
		'title'         => __( 'Contact details', 'nielstorp' ),
		'object_types'  => array( 'employee', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		'fields'        => array(
			array(
				'name' => __( 'Job', 'nielstorp' ),
				'id'   => $prefix . 'job',
				'type' => 'text_medium',
			),
			array(
				'name' => __( 'Email', 'nielstorp' ),
				'id'   => $prefix . 'email',
				'type' => 'text_email',
			),
			array(
				'name' => __( 'Telephone', 'nielstorp' ),
				'id'   => $prefix . 'tel',
				'type' => 'text_medium',
			),
		)
	);

	return $meta_boxes;
}



/******** Posts Metaboxes *******/
add_filter( 'cmb2_meta_boxes', 'nt_posts_metaboxes' );
function nt_posts_metaboxes( array $meta_boxes ) {
	$prefix = '_postdata_';
	$meta_boxes['post_metabox'] = array(
		'id'            => 'post_metabox',
		'title'         => __( 'Some additional item', 'nielstorp' ),
		'object_types'  => array( 'post', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		'fields'        => array(
			array(
				'name' => __( 'Featured video', 'nielstorp' ),
				'desc' => __( 'add a youtube/vimeo url if exists', 'nielstorp' ),
				'id'   => $prefix . 'video',
				'type' => 'text_url',
			),
		)
	);

	return $meta_boxes;
}




add_filter( 'cmb2_meta_boxes', 'nt_home_metaboxes' );
function nt_home_metaboxes( array $meta_boxes ) {
	/**
	 * Apartment Metaboxes
	*/
  $prefix = '_homemeta_';

  $meta_boxes['member'] = array(
    'id'         => 'homemeta',
    'title'      => 'Home details',
    'object_types'  => array( 'page'), // Post type
    'show_on'      => array( 'key' => 'page-template', 'value' => 'template-home.php' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array (
			array(
				'name' => 'Slider',
				'desc' => 'Select multiple images from gallery to add homepage slider',
				'id'   => $prefix.'slides',
				'type' => 'file_list',
				'preview_size' => array( 160, 90 ), // Default: array( 50, 50 )
			)

    )
   );

  return $meta_boxes;
}



function nt_post_class($classes) {
  if (get_post_type()=='project' ) {
		$classes[] = 'project-'.get_the_ID();
  }
  return $classes;
}
add_filter('post_class', 'nt_post_class');



function has_children($post_ID = null) {
    if ($post_ID === null) {
        global $post;
        $post_ID = $post->ID;
    }
    $query = new WP_Query(array('post_parent' => $post_ID, 'post_type' => 'any'));

    return $query->have_posts();
}




function nt_modify_num_projempl($query)
{
    if ( ($query->is_main_query()) && ($query->is_tax('projects') || $query->is_tax('competitions') || $query->is_tax('department') || $query->is_post_type_archive(array('project','competition','employee')) ) && (!is_admin()) ) {
      $query->set('posts_per_page', -1);
      if ( !($query->is_category() ) ) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
      }


    }

}

add_action('pre_get_posts', 'nt_modify_num_projempl');



# Deregister style files
function nt_DequeueYarppStyle()
{
  wp_dequeue_style('yarppRelatedCss');
  wp_deregister_style('yarppRelatedCss');
}
add_action('wp_footer', 'nt_DequeueYarppStyle');

function my_theme_remove_assets_header() {
  wp_dequeue_style('yarppWidgetCss');
}
add_action( 'wp_print_styles', 'my_theme_remove_assets_header' );

function my_theme_remove_assets_footer() {
  wp_dequeue_style('yarppRelatedCss');
}
add_action( 'get_footer', 'my_theme_remove_assets_footer' );
