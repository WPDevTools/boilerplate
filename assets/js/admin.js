jQuery(document).ready(function() {

	jQuery('.wpdt-media-upload-button').click(function() {
		thefield = jQuery(this).attr('id');
		thefield = thefield.replace('-upload', '');
		formfield = jQuery('#' + thefield).attr('name');
		tb_show('', 'media-upload.php?type=image&amp;box=theme_settings&amp;TB_iframe=true');
		return false;
	});

	window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		jQuery('#' + thefield).val(imgurl);
		tb_remove();
	}
	
	jQuery( '.savesend input.button[value*="Insert into Post"], .media-item #go_button' ).attr( 'value', 'Use this File' );

});
