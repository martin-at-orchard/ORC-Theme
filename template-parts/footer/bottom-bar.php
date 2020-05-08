<?php
/**
 * Template part for displaying the footer info
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<div class="bottom-bar">

	<div class="copyright">
		Copyright &copy; 2002-<?php echo wp_date( 'Y' ); ?> Orchard Recovery Center
	</div><!-- /.copyright -->
	<div class="social-links">
		<?php echo do_shortcode( '[orc_social type="facebook" class="bottom-bar-facebook"]' ); ?>
		<?php echo do_shortcode( '[orc_social type="instagram" class="bottom-bar-instagram"]' ); ?>
		<?php echo do_shortcode( '[orc_social type="twitter" class="bottom-bar-twitter"]' ); ?>
		<?php echo do_shortcode( '[orc_social type="youtube" class="bottom-bar-youtube"]' ); ?>
	</div>

</div><!-- /.bottom-bar -->
