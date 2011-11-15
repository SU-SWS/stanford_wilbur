$(document).ready(function(){
	if (document.documentElement.clientWidth <= 640) {
	// Mobile Header Drupal Search Box
	$('#header [name=search_theme_form]').val('Search...');
	$('#header input[name=op]').val('');
	$('#header [name=search_theme_form]').focus(function () {
	$('#header [name=search_theme_form]').val('');
	});
	}

	if (document.documentElement.clientWidth > 640) {
	// Header Drupal Search Box
	$('#header [name=search_theme_form]').val('Search this site...');
	$('#header input[name=op]').val('');
	$('#header [name=search_theme_form]').focus(function () {
	$('#header [name=search_theme_form]').val('');
	});
	}
	
	// Hide border for image links
	$('a:has(img)').css('border', 'none');
});

// Hide Address Bar in Mobile View
addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){
		if (window.pageYOffset < 1) {
		window.scrollTo(0, 1);
	}
}

// Load Mobile View
if ((window.screen.width < 640) || (window.screen.height < 640)){document.write('<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1" />')}