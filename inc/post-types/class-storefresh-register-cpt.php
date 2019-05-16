<?php
/**
 * Storefresh Register CPT Class
 *
 * @author   906 Web Studios
 * @since    1.0.0
 * @package  storefresh
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Storefresh_Register_CPT' ) ) :

	/**
	 * The main class
	 */
	class Storefresh_Register_CPT {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {

			add_action( 'init', array( $this, 'register_cpt' ) );
			add_action( 'init', array( $this, 'register_taxonomy' ) );

		}

		/**
		 * Register Custom Post Type
		 */
		function register_cpt() {
			$labels = array(
				'name'               => _x( 'Books', 'post type general name', 'your-plugin-textdomain' ),
				'singular_name'      => _x( 'Book', 'post type singular name', 'your-plugin-textdomain' ),
				'menu_name'          => _x( 'Books', 'admin menu', 'your-plugin-textdomain' ),
				'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'your-plugin-textdomain' ),
				'add_new'            => _x( 'Add New', 'book', 'your-plugin-textdomain' ),
				'add_new_item'       => __( 'Add New Book', 'your-plugin-textdomain' ),
				'new_item'           => __( 'New Book', 'your-plugin-textdomain' ),
				'edit_item'          => __( 'Edit Book', 'your-plugin-textdomain' ),
				'view_item'          => __( 'View Book', 'your-plugin-textdomain' ),
				'all_items'          => __( 'All Books', 'your-plugin-textdomain' ),
				'search_items'       => __( 'Search Books', 'your-plugin-textdomain' ),
				'parent_item_colon'  => __( 'Parent Books:', 'your-plugin-textdomain' ),
				'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
				'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' )
			);

			$args = array(
				'labels'             => $labels,
				'description'        => __( 'Description.', 'your-plugin-textdomain' ),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'book' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'menu_icon'          => 'dashicons-book',
				'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
			);

			register_post_type( 'book', $args );
		}

		/**
		 * Register Custom Taxonomy
		 */
		function register_taxonomy() {
			$labels = array(
				'name'              => _x( 'Genres', 'taxonomy general name', 'textdomain' ),
				'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'textdomain' ),
				'search_items'      => __( 'Search Genres', 'textdomain' ),
				'all_items'         => __( 'All Genres', 'textdomain' ),
				'parent_item'       => __( 'Parent Genre', 'textdomain' ),
				'parent_item_colon' => __( 'Parent Genre:', 'textdomain' ),
				'edit_item'         => __( 'Edit Genre', 'textdomain' ),
				'update_item'       => __( 'Update Genre', 'textdomain' ),
				'add_new_item'      => __( 'Add New Genre', 'textdomain' ),
				'new_item_name'     => __( 'New Genre Name', 'textdomain' ),
				'menu_name'         => __( 'Genre', 'textdomain' ),
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'genre' ),
			);

			register_taxonomy( 'genre', array( 'book' ), $args );
		}

	}

endif;

return new Storefresh_Register_CPT();