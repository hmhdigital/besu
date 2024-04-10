import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Alpine loads at the bottom of body
document.addEventListener( 'DOMContentLoaded', function( event ) {
	Alpine.start();
} );
