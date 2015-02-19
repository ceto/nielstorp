<?php
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

function cmb2_hide_if_no_cats( $field ) {
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}


add_filter( 'cmb2_meta_boxes', 'nt_project_metaboxes' );
function nt_project_metaboxes( array $meta_boxes ) {
	$prefix = '_pdata_';
	$meta_boxes['project_metabox'] = array(
		'id'            => 'project_metabox',
		'title'         => __( 'Project details', 'nielstorp' ),
		'object_types'  => array( 'project', ), // Post type
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
		'supports'           => array( 'title', 'thumbnail' )
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


function nt_post_class($classes) {
  if (get_post_type()=='project' ) {
		$classes[] = 'project-'.get_the_ID();
  }
  return $classes;
}
add_filter('post_class', 'nt_post_class');






function nt_modify_num_projempl($query)
{
    if ( ($query->is_main_query()) && ($query->is_tax('projects') || $query->is_tax('department') || $query->is_post_type_archive(array('project','employee')) ) && (!is_admin()) ) {
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


