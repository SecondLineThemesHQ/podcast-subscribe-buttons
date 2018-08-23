// OPEN/CLOSE MODAL

jQuery(document).ready(function($) {
	 'use strict';
	
		
	$('.podcast-subscribe-button').on("click", function() {
		$("#secondline-subs-modal").modal({
			fadeDuration: 250,
			closeText: '',
	  });
	  return false;
	});    

});