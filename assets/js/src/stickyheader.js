/**
 * Sticky Header script.
 * 
 * Passed sticky_header_data object from PHP
 *    - sticky_mobile (string) - If we should stick the mobile headers as well
 */
document.addEventListener( 'DOMContentLoaded', function() {

	let header  = document.getElementById( 'masthead' );
	let primary = document.getElementById( 'primary' );
	header.classList.add( 'sticky-header' );
	primary.classList.add( 'sticky-header-main' );
	if ( 'true' === sticky_header_data.sticky_mobile ) {
		header.classList.add( 'stick-mobile' );
		primary.classList.add( 'sticky-mobile-header-main' );
	}

} );
