<?php
$user = wp_get_current_user();
if ( ( get_sub_field( 'member_only_section' ) && ( in_array( 'member', (array) $user->roles ) || in_array( 'business_member', (array) $user->roles ) ) ) || !get_sub_field( 'member_only_section' ) ) {
	$model['tabSection'][$i]['tabContent'][$j]['layoutType'] = $contentRowLayout;
	$model['tabSection'][$i]['tabContent'][$j]['formHtml'] = gravity_form( get_sub_field( 'form_id' ), false, false, false, null, true, 1, false );
}
?>