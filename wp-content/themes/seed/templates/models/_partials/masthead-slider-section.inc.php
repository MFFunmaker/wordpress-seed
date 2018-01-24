<?php
$user = wp_get_current_user();
if ( ( get_sub_field( 'member_only_section' ) && ( in_array( 'member', (array) $user->roles ) || in_array( 'business_member', (array) $user->roles ) ) ) || !get_sub_field( 'member_only_section' ) ) {

	$model['activeNavigationDotColor'] = get_sub_field( 'active_navigation_dot_color' );
	
	if ( have_rows( 'slides' ) ) {
		$i = 0;
		while ( have_rows( 'slides' ) ) {
			the_row();
			if ( ( get_sub_field( 'member_only_section' ) && ( in_array( 'member', (array) $user->roles ) || in_array( 'business_member', (array) $user->roles ) ) ) || !get_sub_field( 'member_only_section' ) ) {

				$model['slides'][$i]['slideType'] = get_sub_field( 'slide_type' );

				switch ( $model['slides'][$i]['slideType'] ) {
					case 'solid_color':
						$model['slides'][$i]['backgroundColor'] = get_sub_field( 'background_color' );
						break;

					case 'image_background':
						$model['slides'][$i]['backgroundImageUrl'] = get_sub_field( 'background_image' )['url'];
						break;

					case 'video_background':
						$model['slides'][$i]['backgroundVideoType'] = get_sub_field( 'background_video_type' );
						$model['slides'][$i]['backgroundVideoCode'] = get_sub_field( 'background_video_code' );  
						break;

					default:
						break;
				}

				$model['slides'][$i]['backgroundOverlayColor'] = get_sub_field( 'background_overlay_color' );
				$model['slides'][$i]['backgroundOverlayOpacity'] = get_sub_field( 'background_overlay_opacity' );
				$model['slides'][$i]['headingText'] = get_sub_field( 'heading_text' );
				$model['slides'][$i]['addButtonsToTheSlide'] = get_sub_field( 'add_buttons_to_the_slide' );

				if ( isset( $model['slides'][$i]['addButtonsToTheSlide'] ) && $model['slides'][$i]['addButtonsToTheSlide'] ) {
					if ( have_rows( 'buttons' ) ) {
						$j = 0;
						while ( have_rows( 'buttons' ) ) {
							the_row();
							$model['slides'][$i]['buttons'][$j]['buttonLabel'] = get_sub_field( 'button_label' );
							$model['slides'][$i]['buttons'][$j]['buttonUrl'] = get_sub_field( 'button_url' );
							$model['slides'][$i]['buttons'][$j]['openInNewTab'] = get_sub_field( 'open_in_a_new_browser_tab' );
							$j++;
						}
					}
				}
			}
			$i++;
		}
	}
}

?>