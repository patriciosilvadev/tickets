/* global jQuery:false */

jQuery(document).on('action.ready_trx_addons', function() {
	"use strict";
	// Click on the logo on home page - scroll to top action
	jQuery('.sc_layouts_logo').on('click', function(e){
		"use strict";
		if (jQuery(this).attr('href') == '#') {
			trx_addons_document_animate_to(0);
			e.preventDefault();
			return false;
		}
	});
});