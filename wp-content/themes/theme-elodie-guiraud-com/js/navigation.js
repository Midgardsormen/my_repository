/* eslint-disable linebreak-style */
/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
import getClosest from './_includes/_functions';

( function() {
	const siteNavigation = document.getElementById( 'site-navigation' );
	const siteBody = document.querySelector( 'body' );

	// Return early if the navigation don't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];

	// Return early if the button don't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}
	/**
	 * Function circleDisplay display li on circle.
	 *
	 * @param {number} type - circle type - 1 whole, 0.5 half, 0.25 quarter
	 * @param {number} radius - distance from center in rem
	 * @param {number} start - shift start from 0 ex = -90
	 * @param {NodeList} $elements - nodelist of all li to display on circle
	 */
	const circleDisplay = ( type, radius, start, $elements ) => {
		$elements.forEach( ( $self, i ) => {
			const numberOfElements = ( type === 1 ) ? $elements.length : $elements.length - 1,
				slice = 360 * type / numberOfElements,
				rotate = ( slice * i ) + start,
				rotateReverse = rotate * -1;
			let elementStyle;
			const $count = i + 1;
			if ( $elements.length % 2 === 1 ) {
				if ( $count < Math.ceil( $elements.length / 2 ) ) {
					elementStyle = { transform: 'rotate(' + rotate + 'deg) translate(' + ( radius + ( $elements.length - i ) ) + 'rem) rotate(' + rotateReverse + 'deg)', width: 'calc(100% - ' + ( radius + $count ) + 'rem)' };
				} else if ( $count > Math.ceil( $elements.length / 2 ) ) {
					elementStyle = { transform: 'rotate(' + rotate + 'deg)  translate(' + ( radius + $count ) + 'rem) rotate(' + rotateReverse + 'deg)', width: 'calc(100% - ' + ( radius + ( $elements.length - i ) ) + 'rem)' };
				} else {
					elementStyle = { transform: 'rotate(' + rotate + 'deg) translateX(' + ( radius + $count + 1 ) + 'rem) rotate(' + rotateReverse + 'deg)', width: 'calc(100% - ' + ( radius + $count + 1 ) + 'rem)' };
				}
			} else if ( $count <= Math.ceil( $elements.length / 2 ) ) {
				elementStyle = { transform: 'rotate(' + rotate + 'deg)  translate(' + ( radius + ( $elements.length - i ) ) + 'rem) rotate(' + rotateReverse + 'deg)', width: 'calc(100% - ' + ( radius + $count ) + 'rem)' };
			} else {
				elementStyle = { transform: 'rotate(' + rotate + 'deg)  translate(' + ( radius + $count ) + 'rem) rotate(' + rotateReverse + 'deg)', width: 'calc(100% - ' + ( radius + ( $elements.length - i ) ) + 'rem)' };
			}

			Object.assign( $self.style, elementStyle );
		} );
	};
	// display first level menu on half circle
	const menuFirstLevel = document.querySelectorAll( '.menu.nav-menu > .menu-item' );
	circleDisplay( 0.5, 2, -90, menuFirstLevel );

	// display other level menu on half circle
	const menuOtherLevels = document.querySelectorAll( 'ul.sub-menu' );
	menuOtherLevels.forEach( ( submenu ) => {
		const $elementSubmenu = submenu.querySelectorAll( ' :scope > li' );
		circleDisplay( 0.5, 1, -90, $elementSubmenu );
	} );
	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	button.addEventListener( 'click', function() {
		siteNavigation.classList.toggle( 'toggled' );
		siteBody.classList.toggle( 'darkFixed' );

		if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
			button.setAttribute( 'aria-expanded', 'false' );
		} else {
			button.setAttribute( 'aria-expanded', 'true' );
		}
	} );

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	let clickableZones = document.querySelectorAll( '.menu-toggle, .menu li, .menu li a' );
	document.addEventListener( 'click', function( event ) {
		const isClickInside = Array.prototype.indexOf.call( clickableZones, event.target );
		if ( isClickInside === -1 ) {
			siteNavigation.classList.remove( 'toggled' );
			siteBody.classList.remove( 'darkFixed' );
			button.setAttribute( 'aria-expanded', 'false' );
			const focusParentAll = document.querySelectorAll( '.focusParent' );
			const focusAll = document.querySelectorAll( '.focus' );
			if ( focusParentAll ) {
				focusParentAll.forEach( function( e ) {
					e.classList.remove( 'focusParent' );
				} );
			}
			if ( focusAll ) {
				focusAll.forEach( function( e ) {
					e.classList.remove( 'focus' );
				} );
			}
		}
	} );

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName( 'a' );

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

	// Toggle focus each time a menu link is focused or blurred.
	for ( const link of links ) {
		link.addEventListener( 'focus', toggleFocus, true );
		link.addEventListener( 'blur', toggleFocus, true );
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for ( const link of linksWithChildren ) {
		link.insertAdjacentHTML( 'afterend', '<span class="menuArrowButton"></span>' );
		clickableZones = document.querySelectorAll( '.menu-toggle, .menu li, .menu li a, .menu li span.menuArrowButton ' );
		const menuArrowButton = link.parentNode.querySelector( '.menuArrowButton' );
		menuArrowButton.addEventListener( 'click', () => {
			const closestUlParent = getClosest( event.target, 'ul' );
			closestUlParent.innerHTML = link.parentNode.querySelector( '.sub-menu' ).innerHTML;
		}, false );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( ! self.classList.contains( 'nav-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}

		if ( event.type === 'click' ) {
			const menuItem = this.parentNode;
			menuItem.querySelector( 'ul' ).insertAdjacentHTML( 'afterbegin', '<li class="arrowBack">test</li>' );
			for ( const link of menuItem.parentNode.children ) {
				if ( menuItem !== link ) {
					link.classList.remove( 'focus' );
					menuItem.parentNode.classList.remove( 'focusParent' );
				}
			}
			menuItem.classList.toggle( 'focus' );
			menuItem.parentNode.classList.toggle( 'focusParent' );
		}
	}
	const arrowBack = document.querySelectorAll( 'ul li.arrowBack' );
	if ( arrowBack ) {
		for ( const link of arrowBack ) {
			link.addEventListener( 'click', ( event ) => {
				debugger;
				this.parentNode.classList.remove( 'focus' );
				const closestUlParent = getClosest( event.target, '.focusParent' );
				console.log( closestUlParent );
				closestUlParent.classList.remove( 'focusParent' );
				console.log( this );
				this.parentNode.removeChild( this );
			} );
		}
	}
}() );
