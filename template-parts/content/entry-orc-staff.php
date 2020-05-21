<?php
/**
 * Template part for displaying a post's content
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$position       = get_post_meta( get_the_ID(), 'orc-staff-position', true );
$qualifications = get_post_meta( get_the_ID(), 'orc-staff-qualifications', true );

?>

<div class="entry-content">
	<?php
	the_title( '<h1>', '</h1>', true );
	$atts = array( 'class' => 'staff-img' );
	the_post_thumbnail( 'thumbnail', $atts );
	if ( ! empty( $position ) ) {
		echo '<h2 class="staff-position">' . esc_attr( $position ) . '</h2>';
	}
	if ( ! empty( $qualifications ) ) {
		echo '<h3 class="staff-qualifications">' . esc_attr( $qualifications ) . '</h3>';
	}
	echo '<div class="staff-content">';
	the_content();
	echo '</div><!-- /.staff-content -->';

	if ( is_singular( get_post_type() ) ) {

		the_post_navigation(
			[
				'prev_text' => '<div class="post-navigation-sub"><span>' . esc_html__( 'Previous Staff Member', 'wp-rig' ) . '</span></div>%title',
				'next_text' => '<div class="post-navigation-sub"><span>' . esc_html__( 'Next Staff Member', 'wp-rig' ) . '</span></div>%title',
			]
		);

	}

	?>
</div><!-- .entry-content -->
