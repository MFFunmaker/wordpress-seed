<?php
$user = wp_get_current_user();
if ( ( get_sub_field( 'member_only_section' ) && ( in_array( 'member', (array) $user->roles ) || in_array( 'business_member', (array) $user->roles ) ) ) || !get_sub_field( 'member_only_section' ) ) {
	$model['backgroundImageUrl'] = get_sub_field( 'background_image' )['url'];

	if ( have_rows( 'blurbs' ) ) {
		$i = 0;
		while ( have_rows( 'blurbs' ) ) {
			the_row();
			$model['blurbs'][$i]['iconUrl'] = get_sub_field( 'blurb_icon' )['url'];
			$model['blurbs'][$i]['title'] = get_sub_field( 'blurb_title' );
			$model['blurbs'][$i]['subtitle'] = get_sub_field( 'blurb_subtitle' );
			$i++;
		}
	}

	// get the appended call out banner, if appl
	$model['appendCallOutBanner'] = get_sub_field( 'append_call_out_banner' );
	if ( isset( $model['appendCallOutBanner'] ) && $model['appendCallOutBanner'] ) {
		$model['callOutBannerTitle'] = get_sub_field( 'call_out_banner_title' );
		$model['callOutBannerBackgroundColor'] = get_sub_field( 'call_out_banner_background_color' );
		$model['callOutBannerBackgroundOpacity'] = intval( get_sub_field( 'call_out_banner_background_opacity' ) )/100;
	}
}
?>