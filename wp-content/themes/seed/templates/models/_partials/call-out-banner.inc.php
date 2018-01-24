<?php
$user = wp_get_current_user();
if ( ( get_sub_field( 'member_only_section' ) && ( in_array( 'member', (array) $user->roles ) || in_array( 'business_member', (array) $user->roles ) ) ) || !get_sub_field( 'member_only_section' ) ) {
	$model['title'] = get_sub_field( 'title' );
	$model['backgroundColor'] = get_sub_field( 'background_color' );
	$model['backgroundOpacity'] = intval(get_sub_field( 'background_opacity' ))/100;
}
?>