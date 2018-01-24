<?php
$user = wp_get_current_user();
if ( ( get_sub_field( 'member_only_section' ) && ( in_array( 'member', (array) $user->roles ) || in_array( 'business_member', (array) $user->roles ) ) ) || !get_sub_field( 'member_only_section' ) ) {
	$model['tabSection'][$i]['tabContent'][$j]['layoutType'] = $contentRowLayout;
	$text = get_sub_field( 'text' );

	// replace any placeholders that require dynamic data
	$placeholders = [
		'{{currentMonth}}' => date( 'F' ),
		'{{currentYear}}' => date( 'Y'),
		'{{dayOrdinal}}' => date( 'jS' ),
		'{{nextYear}}' => (intval( date( 'Y' ) ) + 1)
	];

	foreach ( $placeholders as $placeholder => $value ) {
		$text = str_replace( $placeholder, $value, $text );
	}

	$model['tabSection'][$i]['tabContent'][$j]['text'] = $text;
}
?>