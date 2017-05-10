(function($) {
	
	var $f = $("#dvkss_settings");

	function toggleRows() {
		$f.find('.row-icon-size').toggle( ($f.find('.row-load-icon-css input:checked').val() == 1) );
	}

	$f.change(toggleRows);

	// run once on init
	toggleRows();

})(jQuery);