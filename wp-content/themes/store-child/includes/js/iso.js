jQuery(document).ready(function($) {

var $grid = $('.termbox-18').isotope({
  itemSelector: '.product',
	layoutMode: 'fitRows',
	percentPosition: true,
})
	
	$('.filters-button-group').on( 'click', '.filtered-button', function() {
		var filterValue = $(this).attr('data-filter');
		$grid.isotope({ filter: filterValue });
	});
	
	$('.button-group').each( function( i, buttonGroup ) {
		var $buttonGroup = $( buttonGroup );
		$buttonGroup.on( 'click', 'button', function() {
			$buttonGroup.find('.is-checked').removeClass('is-checked');
			$( this ).addClass('is-checked');
		});
	});

});