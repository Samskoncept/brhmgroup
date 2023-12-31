<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package CGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 *
 * Assets enqueued:
 * 1. blocks.style.build.css - Frontend + Backend.
 * 2. blocks.build.js - Backend.
 * 3. blocks.editor.build.css - Backend.
 *
 * @uses {wp-blocks} for block type registration & related functions.
 * @uses {wp-element} for WP Element abstraction — structure of blocks.
 * @uses {wp-i18n} to internationalize the block's text.
 * @uses {wp-editor} for WP editor styles.
 * @since 1.0.0
 */
function darklup_switch_block_cgb_block_assets() { // phpcs:ignore
	// Register block styles for both frontend + backend.
	wp_register_style(
		'darklup_switch_block-cgb-style-css', // Handle.
		plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ),
		is_admin() ? array( 'wp-editor' ) : null,
		null
	);

	// Register block editor script for backend.
	wp_register_script(
		'darklup_switch_block-cgb-block-js', // Handle.
		plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ), // Block.build.js: We register the block here. Built with Webpack.
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components' ), // Dependencies, defined above.
		null, // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: filemtime — Gets file modification time.
		true // Enqueue the script in the footer.
	);

	// Register block editor styles for backend.
	wp_register_style(
		'darklup_switch_block-cgb-block-editor-css', // Handle.
		plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ), // Block editor CSS.
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		null // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' ) // Version: File modification time.
	);

	// WP Localized globals. Use dynamic PHP stuff in JavaScript via `cgbGlobal` object.
	wp_localize_script(
		'darklup_switch_block-cgb-block-js',
		'cgbGlobal', // Array containing dynamic data for a JS Global.
		[
			'pluginDirPath' => plugin_dir_path( __DIR__ ),
			'pluginDirUrl'  => plugin_dir_url( __DIR__ ),
			// Add more data here that you want to access from `cgbGlobal` object.
		]
	);

	/**
	 * Register Gutenberg block on server-side.
	 *
	 * Register the block on server-side to ensure that the block
	 * scripts and styles for both frontend and backend are
	 * enqueued when the editor loads.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/blocks/writing-your-first-block-type#enqueuing-block-scripts
	 * @since 1.16.0
	 */
	register_block_type(
		'cgb/block-darklup-switch-block', array(
			// Enqueue blocks.style.build.css on both frontend & backend.
			'style'         => 'darklup_switch_block-cgb-style-css',
			// Enqueue blocks.build.js in the editor only.
			'editor_script' => 'darklup_switch_block-cgb-block-js',
			// Enqueue blocks.editor.build.css in the editor only.
			'editor_style'  => 'darklup_switch_block-cgb-block-editor-css',
            'attributes' => array(
                'switchStyle' => array(
                    'type' => 'string',
                ),
                'alignment' => array(
                    'type' => 'string',
                ),
            ),
			'render_callback' => 'darklup_gutenberg_examples_dynamic_render_callback',
		)
	);
}

// Hook: Block assets.
add_action( 'init', 'darklup_switch_block_cgb_block_assets' );

// render callback
function darklup_gutenberg_examples_dynamic_render_callback( $attributes ) {
	
	ob_start();

	$alignment = !empty( $attributes['alignment'] ) ? $attributes['alignment'] : '';

	$switchStyle = isset($attributes['switchStyle']) ? $attributes['switchStyle'] : 1 ;

	echo '<div class="darklup-guten-darkmode-switch" style="text-align:'.esc_attr( $alignment ).'">';
		echo do_shortcode('[darklup_darkmode_switch style="'.esc_html( $switchStyle ).'"]');
	echo '</div>';

	return ob_get_clean();
}