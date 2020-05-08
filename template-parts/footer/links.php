<?php
/**
 * Template part for displaying the footer info
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<div class="links">

	<div class="contact">
		<span>811 Grafton Road</span>
		<span>Bowen Island, BC, V0N1G2</span>
		<?php echo do_shortcode( '[orc_contact type="tollfree" icon="true" link="true" suffix="(toll free)"]' ); ?>
		<?php echo do_shortcode( '[orc_contact type="local" icon="true" link="true" suffix="(local)"]' ); ?>
		<?php echo do_shortcode( '[orc_contact type="text" icon="true" link="true" suffix="(text)"]' ); ?>
		<?php echo do_shortcode( '[orc_contact type="fax" icon="true" link="true" suffix="(fax)"]' ); ?>
		<?php echo do_shortcode( '[orc_contact type="intake" icon="true" link="true" prefix="Email"]' ); ?>
	</div><!-- /.contact -->
	<?php if ( wp_rig()->is_footer_nav_menu_active()  ) { ?>
	<div class="footer-menu-container">
		<?php wp_rig()->display_footer_nav_menu( [ 'menu_id' => 'footer-menu' ] ); ?>
	</div>
	<?php } ?>


</div><!-- /.links -->
