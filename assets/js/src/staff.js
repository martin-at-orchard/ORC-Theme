'use strict';

/**
 * Check to see if the program, staff, admission or testimonial objects are clicked or
 * if a child of the object is clicked.
 */
document.addEventListener('click', function (event) {

	const got_department = event.target.matches( '.department' );

	if ( got_department ) {

		const id     = event.target.id;
		const staff  = document.getElementsByClassName( 'staff' );
		const active = document.getElementsByClassName( 'active' );

		// Set the active button
		for ( let item of active ) {
			item.classList.remove( 'active' );
		}
		event.target.classList.add( 'active' );

		if ( 'all' === id ) {
			// Want to display ALL the staff members,
			// remove the hidden class
			for ( let item of staff ) {
				item.classList.remove( 'hidden' );
			}
		} else {
			// Want to display only staff in a specific department,
			// add the hidden class to everything,
			// then remove on selected items
			const selected = document.getElementsByClassName( id );
			for ( let item of staff ) {
				item.classList.add( 'hidden' );
			}
			for ( let item of selected ) {
				item.classList.remove( 'hidden' );
			}
		}

	}

}, false);
