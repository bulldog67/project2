<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Filterable_Portfolio_Admin' ) ) {

	class Filterable_Portfolio_Admin {

		/**
		 * Instance of current class
		 *
		 * @var self
		 */
		protected static $instance;

		/**
		 * Plugin options
		 *
		 * @var array
		 */
		private $options = array();

		/**
		 * Portfolio post type slug
		 *
		 * @var string
		 */
		private $portfolio_slug = 'portfolio';

		/**
		 * Portfolio taxonomy slug
		 *
		 * @var string
		 */
		private $category_slug = 'portfolio-category';

		/**
		 * Portfolio skill slug
		 *
		 * @var string
		 */
		private $skill_slug = 'portfolio-skill';

		/**
		 * Ensures only one instance of this class is loaded or can be loaded.
		 *
		 * @param array $options
		 *
		 * @return self
		 */
		public static function init( $options = array() ) {

			if ( is_null( self::$instance ) ) {
				self::$instance = new self( $options );
			}

			return self::$instance;
		}

		/**
		 * Filterable_Portfolio_Admin constructor.
		 *
		 * @param array $options
		 */
		public function __construct( $options = array() ) {
			add_action( 'filterable_portfolio_activation', array( $this, 'post_type' ) );
			add_action( 'filterable_portfolio_activation', array( $this, 'taxonomy' ) );
			add_action( 'init', array( $this, 'post_type' ) );
			add_action( 'init', array( $this, 'taxonomy' ) );

			$this->options = $options;

			// Set portfolio slug from plugin option
			if ( ! empty( $this->options['portfolio_slug'] ) ) {
				$this->portfolio_slug = $this->options['portfolio_slug'];
			}

			// Set portfolio category slug from plugin option
			if ( ! empty( $this->options['category_slug'] ) ) {
				$this->category_slug = $this->options['category_slug'];
			}

			// Set portfolio skill slug from plugin option
			if ( ! empty( $this->options['skill_slug'] ) ) {
				$this->skill_slug = $this->options['skill_slug'];
			}
		}

		/**
		 * Create portfolio post type
		 *
		 * @return void
		 */
		public function post_type() {
			$labels = apply_filters( 'filterable_portfolio_labels', array(
				'name'               => __( 'Portfolios', 'filterable-portfolio' ),
				'singular_name'      => __( 'Portfolio', 'filterable-portfolio' ),
				'menu_name'          => __( 'Portfolios', 'filterable-portfolio' ),
				'parent_item_colon'  => __( 'Parent Portfolio:', 'filterable-portfolio' ),
				'all_items'          => __( 'All Portfolios', 'filterable-portfolio' ),
				'view_item'          => __( 'View Portfolio', 'filterable-portfolio' ),
				'add_new_item'       => __( 'Add New Portfolio', 'filterable-portfolio' ),
				'add_new'            => __( 'Add New', 'filterable-portfolio' ),
				'edit_item'          => __( 'Edit Portfolio', 'filterable-portfolio' ),
				'update_item'        => __( 'Update Portfolio', 'filterable-portfolio' ),
				'search_items'       => __( 'Search Portfolio', 'filterable-portfolio' ),
				'not_found'          => __( 'Not found', 'filterable-portfolio' ),
				'not_found_in_trash' => __( 'Not found in Trash', 'filterable-portfolio' ),
			) );

			$args = array(
				'label'               => __( 'Portfolios', 'filterable-portfolio' ),
				'description'         => __( 'A WordPress filterable portfolio to display portfolio images or gallery to your site.',
					'filterable-portfolio' ),
				'labels'              => $labels,
				'supports'            => apply_filters( 'filterable_portfolio_supports', array(
					'title',
					'editor',
					'thumbnail',
					'comments',
					'revisions'
				) ),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				'menu_position'       => 5,
				'menu_icon'           => 'dashicons-portfolio',
				'can_export'          => true,
				'has_archive'         => true,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'rewrite'             => array(
					'slug'       => $this->portfolio_slug,
					'with_front' => false,
				),
				'capability_type'     => 'page',
			);
			register_post_type( 'portfolio', apply_filters( 'filterable_portfolio_post_type_args', $args ) );
		}

		/**
		 * Create two taxonomies "portfolio_cat" and "portfolio_skill"
		 * for the post type "portfolio"
		 *
		 * @return void
		 */
		public function taxonomy() {
			register_taxonomy( 'portfolio_cat', 'portfolio',
				apply_filters( 'filterable_portfolio_category_args', array(
					'label'             => __( 'Categories', 'filterable-portfolio' ),
					'singular_label'    => __( 'Category', 'filterable-portfolio' ),
					'hierarchical'      => true,
					'public'            => true,
					'show_ui'           => true,
					'show_admin_column' => true,
					'show_in_nav_menus' => true,
					'args'              => array( 'orderby' => 'term_order' ),
					'query_var'         => true,
					'rewrite'           => array( 'slug' => $this->category_slug, 'hierarchical' => true ),
				) )
			);

			register_taxonomy( 'portfolio_skill', 'portfolio',
				apply_filters( 'filterable_portfolio_skill_args', array(
					'label'             => __( 'Skills', 'filterable-portfolio' ),
					'singular_label'    => __( 'Skill', 'filterable-portfolio' ),
					'hierarchical'      => true,
					'public'            => true,
					'show_ui'           => true,
					'show_admin_column' => true,
					'show_in_nav_menus' => true,
					'args'              => array( 'orderby' => 'term_order' ),
					'query_var'         => true,
					'rewrite'           => array( 'slug' => $this->skill_slug, 'hierarchical' => true ),
				) )
			);
		}
	}
}
