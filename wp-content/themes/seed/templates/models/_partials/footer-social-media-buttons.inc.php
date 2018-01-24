<?php
if ( have_rows( 'social_media_accounts', 'option' ) ) {
	$i = 0;
	while ( have_rows( 'social_media_accounts', 'option' ) ) {
		the_row();
		$partialModel[$i]['socialMediaType'] = get_sub_field( 'social_media_type' );
		$partialModel[$i]['socialMediaButtonImage'] = get_sub_field( 'social_media_button_image' )['url'];
		$partialModel[$i]['socialMediaPageLink'] = get_sub_field( 'social_media_page_link' );
		$i++;
	}
}
?>