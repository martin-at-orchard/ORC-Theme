<?php
/**
 * Template part for displaying the top bar
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( ! wp_rig()->is_topbar_active() ) {
	return;
}

wp_rig()->print_styles( 'wp-rig-topbar' );

?>
<div class="top-bar">
	<div class="top-bar-contact">
		<?php echo do_shortcode( '[orc_contact type="intake" icon="true" link="true" prefix="Email:" class="top-bar-intake"]' ); ?>
		<?php echo do_shortcode( '[orc_contact type="tollfree" icon="true" link="true" prefix="Toll Free:" suffix="(24hrs)" class="top-bar-toll-free"]' ); ?>
	</div>
	<div class="top-bar-social">
		<?php echo do_shortcode( '[orc_social type="facebook" class="top-bar-facebook"]' ); ?>
		<?php echo do_shortcode( '[orc_social type="instagram" class="top-bar-instagram"]' ); ?>
		<?php echo do_shortcode( '[orc_social type="twitter" class="top-bar-twitter"]' ); ?>
		<?php echo do_shortcode( '[orc_social type="youtube" class="top-bar-youtube"]' ); ?>
	</div>
</div>
