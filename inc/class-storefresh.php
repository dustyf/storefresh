<?php
/**
 * Storefresh Class
 *
 * @author   906 Web Studios
 * @since    1.0.0
 * @package  storefresh
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Storefresh' ) ) :

	/**
	 * The main class
	 */
	class Storefresh {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'setup' ) );
			add_action( 'widgets_init', array( $this, 'widgets_init' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ), 20 );
			add_action( 'template_redirect', array( $this, 'remove_storefront_actions' ) );
			add_action( 'template_redirect', array( $this, 'add_storefront_actions' ) );
			// add_action( 'wp_head', array( $this, 'add_fb_og' ) );
			add_filter( 'wpseo_metabox_prio', array( $this, 'yoasttobottom' ) );
			// add_action( 'wp_footer', array( $this, 'add_fb_messenger' );

			// $this->setup_beaverbuilder();
		}

		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		public function setup() {
			load_theme_textdomain( 'storefresh', get_stylesheet_directory() . '/languages' );
			
			// Set custom image sizes
			// add_image_size( 'event-photo-view', 400, 400, true );
		}

		/**
		 * Removing actions we no longer need in place
		 */
		public function remove_storefront_actions() {
			if ( 'tpl-builder.php' === get_page_template_slug( get_the_ID() ) ) {
				remove_action( 'storefront_page', 'storefront_page_header', 10 );
			}
		}

		/**
		 * Add actions relating to Storefront theme.
		 */
		public function add_storefront_actions() {
			add_filter( 'body_class', array( $this, 'body_classes' ), 20 );
		}

		/**
		 * Register widget area.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
		 */
		public function widgets_init() {

		}

		/**
		 * Enqueue scripts and styles.
		 *
		 * @since  1.0.0
		 */
		public function scripts() {
			$debug = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG == true ) || ( isset( $_GET['script_debug'] ) ) ? true : false;
			$version = STOREFRESH_VERSION;
			$suffix = ( true === $debug ) ? '' : '.min';

			wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:200,400,400i,900', array() );

			wp_enqueue_style( 'storefresh-style', get_stylesheet_directory_uri() . '/assets/css/style'  . $suffix . '.css', array( 'storefront-style' ), $version );
			wp_enqueue_script( 'storefresh-scripts', get_stylesheet_directory_uri() . '/assets/js/project' . $suffix . '.js', array( 'jquery' ), $version, true );
		}

		/**
		 * Adds custom classes to the array of body classes.
		 *
		 * @param array $classes Classes for the body element.
		 * @return array
		 */
		public function body_classes( $classes ) {
			if ( is_page_template( 'tpl-builder.php' ) ) {
				foreach ( $classes as $key => $value ) {
					if ( in_array( $value, array( 'left-sidebar', 'right-sidebar' )) ) {
						unset( $classes[ $key ] );
						$classes[ $key ] = '';
					}
				}
				$classes[ $key ] = 'storefront-full-width-content';
			}
			return $classes;
		}

		/**
		 * Loads Builder Modules
		 */
		function setup_beaverbuilder() {
			/**
			 * Require all the module classes.
			 */
			require_once 'beaver-builder-modules/homepage-hero/class-heb-bb-hero-module.php';
		}

		/**
		 * Add Facebook Open Graph Data
		 */
		public function add_fb_og() {
			if ( is_singular( 'tribe_events' ) ) :
				global $post;
				if ( has_post_thumbnail( $post->ID ) ) {
					$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					$width = $featured_image[1];
					$height = $featured_image[2];
					$featured_image = $featured_image[0];
				} else {
					$featured_image = get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg';
					$width = 500;
					$height = 500;
				}
				?>
				<meta property="og:url"                content="<?php echo get_permalink( $post->ID ); ?>" />
				<meta property="og:type"               content="article" />
				<meta property="og:title"              content="<?php echo get_the_title( $post->ID ); ?>" />
				<meta property="og:description"        content="<?php echo get_the_excerpt( $post->ID ); ?>" />
				<meta property="og:image"              content="<?php echo esc_url( $featured_image ); ?>" />
				<meta property="og:image:width"        content="<?php echo esc_attr( $width ); ?>" />
				<meta property="og:image:height"       content="<?php echo esc_attr( $height ); ?>" />
				<?php
			endif;
		}

		/**
		 * Move Yoast Metabox to the bottom
		 *
		 * @return string
		 */
		public function yoasttobottom() {
			return 'low';
		}

		/**
		 * Add Facebook Messenger Widget
		 */
		public function add_fb_messenger() {
			?>
			<!-- Load Facebook SDK for JavaScript -->
			<div id="fb-root"></div>
			<script>
				window.fbAsyncInit = function() {
					FB.init({
						xfbml            : true,
						version          : 'v3.3'
					});
				};

				(function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s); js.id = id;
					js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>

			<!-- Your customer chat code -->
			<div class="fb-customerchat"
			     attribution=setup_tool
			     page_id="">
			</div>
			<?php
		}

	}
endif;

return new Storefresh();
