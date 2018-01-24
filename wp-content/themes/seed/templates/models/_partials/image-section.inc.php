<?php
$user = wp_get_current_user();
if ( ( get_sub_field( 'member_only_section' ) && ( in_array( 'member', (array) $user->roles ) || in_array( 'business_member', (array) $user->roles ) ) ) || !get_sub_field( 'member_only_section' ) ) {
	$model['makeFullWidth'] = get_sub_field( 'make_full_width' );
	if ( $model['makeFullWidth'] == true ) {
		$model['makeFullWidth'] = '--full-width';
	} else {
		$model['makeFullWidth'] = '';
	}
	$model['imageUrl'] = get_sub_field( 'image' )['url'];
	$model['caption'] = get_sub_field( 'caption' );
}
?>