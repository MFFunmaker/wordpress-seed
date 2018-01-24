<?php
$model['featuredImageUrl'] = get_field( 'club_featured_image' )['url'];
$model['region'] = get_field( 'region' );
$model['presidentName'] = get_field( 'president_name' );
$model['presidentEmail'] = get_field( 'president_email' );

$model['presidentAddressLine1'] = get_field( 'president_street_address' );
$model['presidentAddressLine2'] = get_field( 'president_city' ) . ', ' . get_field( 'president_state' ) . ' ' . get_field( 'president_postal_code' );

if ( have_rows( 'president_phone_numbers' ) ) {
	$i = 0;
	while ( have_rows( 'president_phone_numbers' ) ) {
		the_row();
		$model['phoneNumbers'][$i]['phoneNumberType'] = get_sub_field( 'phone_number_type' );
		$model['phoneNumbers'][$i]['phoneNumber'] = get_sub_field( 'phone_number' );
		$i++;
	}
}


$model['clubName'] = get_the_title();
$model['clubAddressLine1'] = get_field( 'club_street_address' );
$model['clubAddressLine2'] = get_field( 'club_city' ) . ', ' . get_field( 'club_state' ) . ' ' . get_field( 'club_postal_code' );
$model['clubEmail'] = get_field( 'club_email' );
$model['clubWebsite'] = get_field( 'club_website' );
$model['clubDescription'] = get_field( 'club_description' );
?>