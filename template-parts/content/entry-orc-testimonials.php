<?php
/**
 * Template part for displaying a post
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$location = get_post_meta( get_the_ID(), 'orc-testimonial-location', true );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<?php
	the_title( '<h1 class="entry-title">', '</h1>' );

	if ( ! empty( $location ) ) {
		echo '<div class="location">' . esc_attr( $location ) . '</div>';
	}

	get_template_part( 'template-parts/content/entry_content' );

	?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php
if ( is_singular( get_post_type() ) ) {

	the_post_navigation(
		[
			'prev_text' => '<div class="post-navigation-sub"><span>' . esc_html__( 'Previous Testimonial', 'wp-rig' ) . '</span></div>%title',
			'next_text' => '<div class="post-navigation-sub"><span>' . esc_html__( 'Next Testimonial', 'wp-rig' ) . '</span></div>%title',
		]
	);

}
