<?php
/**
 * DP: Block Patterns
 *
 */
if ( ! function_exists( 'dp_register_block_patterns' ) ) :

	function dp_register_block_patterns() {

		if ( function_exists( 'register_block_pattern_category' ) ) {

			register_block_pattern_category(
				'dp-general',
				array( 'label' => __( 'dp General', 'dp' ) )
			);
			register_block_pattern_category(
				'dp-footers',
				array( 'label' => __( 'dp Footers', 'dp' ) )
			);
			register_block_pattern_category(
				'dp-headers',
				array( 'label' => __( 'dp Headers', 'dp' ) )
			);
			register_block_pattern_category(
				'dp-posts',
				array( 'label' => __( 'dp Posts', 'dp' ) )
			);
			register_block_pattern_category(
				'dp-pages',
				array( 'label' => __( 'dp Pages', 'dp' ) )
			);
			register_block_pattern_category(
				'dp-forms',
				array( 'label' => __( 'dp Forms', 'dp' ) )
			);
		}

		if ( function_exists( 'register_block_pattern' ) ) {
			
			$block_patterns = array(
				'general-two-images-text',
			);

			foreach ( $block_patterns as $block_pattern ) {
				register_block_pattern(
					'dp/' . $block_pattern,
					require __DIR__ . '/patterns/' . $block_pattern . '.php'
				);
			}
		}
	}
endif;
add_action( 'init', 'dp_register_block_patterns', 9 );