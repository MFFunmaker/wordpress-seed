<?php
$user = wp_get_current_user();
if ( ( get_sub_field( 'member_only_section' ) && ( in_array( 'member', (array) $user->roles ) || in_array( 'business_member', (array) $user->roles ) ) ) || !get_sub_field( 'member_only_section' ) ) {

	$args = array(
		"post_type" => "yearly_recognition",
		"post_status" => "publish",
		"post_per_page" => -1,
		'meta_key' => 'year',
		'orderby' => 'meta_value',
		'order' => 'DESC'
	);

	$recognitionQuery = new WP_Query( $args );

	if ( $recognitionQuery->have_posts() ) {
		$i = 0;
		while ( $recognitionQuery->have_posts() ) {
			$recognitionQuery->the_post();
			$year = get_field( 'year' );
			$model[$year][$i]['personName'] = get_the_title();
			$model[$year][$i]['awardObj'] = get_field( 'award' );

			$city = get_field( 'city' ) . ', ';
			if ( !empty( $city ) ) {
				$location = $city;
			} else {
				$location = '';
			}

			$state = get_field( 'state' );
			if ( !empty( $state ) ) {
				$location .= $state;
			} else {
				$location = trim( $location, ', ' );
			}
			
			$model[$year][$i]['location'] = $location;

			$clubObj = get_field( 'club' );
			if ( !empty( $clubObj ) ) {
				$model[$year][$i]['clubObj'] = get_field( 'club' );
			}

			$i++;
		}
	}

	wp_reset_postdata();

}