<?php
/**
 * Output the Google Fonts CSS.
 *
 * @package   olympus-google-fonts
 * @copyright Copyright (c) 2020, Fonts Plugin
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Output the font CSS to wp_head.
 */
function ogf_output_css() {
	?>
	<!-- Fonts Plugin CSS - https://fontsplugin.com/ -->
	<style>
		<?php

		do_action( 'ogf_inline_styles' );

		foreach ( ogf_get_elements() as $id => $values ) {
			ogf_generate_css( $values['selectors'], $id );
		}
		foreach ( ogf_get_custom_elements() as $id => $values ) {
			ogf_generate_css( $values['selectors'], $id );
		}
		?>
	</style>
	<!-- Fonts Plugin CSS -->
	<?php
}

// Output custom CSS to live site.
add_action( 'wp_head', 'ogf_output_css', 1000 );

/**
 * Helper function to build the CSS styles.
 *
 * @param string $selector    The CSS selector to apply the styles to.
 * @param string $option_name The option name to pull from the database.
 */
function ogf_generate_css( $selector, $option_name ) {

	$family         = get_theme_mod( $option_name . '_font', false );
	$font_size      = get_theme_mod( $option_name . '_font_size', false );
	$line_height    = get_theme_mod( $option_name . '_line_height', false );
	$weight         = get_theme_mod( $option_name . '_font_weight', false );
	$style          = get_theme_mod( $option_name . '_font_style', false );
	$color          = get_theme_mod( $option_name . '_font_color', false );
	$text_transform = get_theme_mod( $option_name . '_text_transform', false );
	$letter_spacing = get_theme_mod( $option_name . '_letter_spacing', false );

	$return = '';

	if ( ( $family !== 'default' && $family ) ||
			 ( $line_height !== '0' && $line_height ) ||
			 ( $weight !== '0' && $weight ) ||
			 ( $style !== 'default' && $style ) ||
			   $font_size || $letter_spacing || $text_transform ||
			   $color ) {

		$return .= $selector . ' {' . PHP_EOL;

		// Return font-family CSS.
		if ( false !== $family && 'default' !== $family ) {

			$stack = ogf_build_font_stack( $family );

			if ( ! empty( $stack ) ) {
				$return .= sprintf(
					'font-family: %s;' . PHP_EOL,
					$stack . ogf_is_forced()
				);
			}
		}

		// Return font-size CSS.
		if ( $font_size ) {
			$return .= sprintf(
				'font-size: %s;' . PHP_EOL,
				floatval( $font_size ) . 'px' . ogf_is_forced()
			);
		}

		// Return font line-height CSS.
		if ( $line_height && '0' !== $line_height ) {
			$return .= sprintf(
				'line-height: %s;' . PHP_EOL,
				floatval( $line_height ) . ogf_is_forced()
			);
		}

		// Return font-style CSS.
		if ( $style && 'default' !== $style ) {
			$return .= sprintf(
				'font-style: %s;' . PHP_EOL,
				esc_attr( $style ) . ogf_is_forced()
			);
		}

		// Return font-weight CSS.
		if ( $weight && '0' !== $weight ) {
			$return .= sprintf(
				'font-weight: %s;' . PHP_EOL,
				absint( $weight ) . ogf_is_forced()
			);
		}

		// Return font-color CSS.
		if ( $color ) {
			$return .= sprintf(
				'color: %s;' . PHP_EOL,
				esc_attr( $color ) . ogf_is_forced()
			);
		}

		// Return font-color CSS.
		if ( $letter_spacing ) {
			$return .= sprintf(
				'letter-spacing: %s;' . PHP_EOL,
				esc_attr( $letter_spacing ) . 'px' . ogf_is_forced()
			);
		}

		// Return text-transform CSS.
		if ( $text_transform ) {
			$return .= sprintf(
				'text-transform: %s;' . PHP_EOL,
				esc_attr( $text_transform ) . ogf_is_forced()
			);
		}

		$return .= ' }' . PHP_EOL;

		echo wp_kses_post( $return );

	}

}

/**
 * Build a font stack using the users font choice.
 *
 * @param  string $font_id The users font choice.
 * @return string The built font stack.
 */
function ogf_build_font_stack( $font_id ) {

	$google_fonts = ogf_fonts_array();

	if ( array_key_exists( $font_id, $google_fonts ) ) {

		$stack = '"' . $google_fonts[ $font_id ]['f'] . '"';

		return $stack;

	}

	$system_fonts = ogf_system_fonts();

	$font_id = str_replace( 'sf-', '', $font_id );

	if ( array_key_exists( $font_id, $system_fonts ) ) {

		return $system_fonts[ $font_id ]['stack'];

	}

}

/**
 * Check if the styles should be forced.
 */
function ogf_is_forced() {

	if ( 1 === (int) get_theme_mod( 'ogf_force_styles' ) ) {
		return ' !important';
	}

}

/**
 * Helper function to build the CSS variables.
 */
function ogf_generate_css_variables() {

	$body_font     = get_theme_mod( 'ogf_body_font', false );
	$headings_font = get_theme_mod( 'ogf_headings_font', false );
	$inputs_font   = get_theme_mod( 'ogf_inputs_font', false );

	$body_font_stack     = '';
	$headings_font_stack = '';
	$inputs_font_stack   = '';

	if ( $body_font ) {
		$body_font_stack = str_replace( '"', '', ogf_build_font_stack( $body_font ) );
	}
	if ( $headings_font ) {
		$headings_font_stack = str_replace( '"', '', ogf_build_font_stack( $headings_font ) );
	}
	if ( $inputs_font ) {
		$inputs_font_stack = str_replace( '"', '', ogf_build_font_stack( $inputs_font ) );
	}

	$css =
	'
	:root {
		--font-body: ' . esc_attr( $body_font_stack ) . ';
		--font-heading: ' . esc_attr( $headings_font_stack ) . ';
		--font-input: ' . esc_attr( $inputs_font_stack ) . ';
	}
	';

	return $css;

}