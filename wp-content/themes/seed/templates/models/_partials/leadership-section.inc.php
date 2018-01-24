<?php
$user = wp_get_current_user();
if ( ( get_sub_field( 'member_only_section' ) && ( in_array( 'member', (array) $user->roles ) || in_array( 'business_member', (array) $user->roles ) ) ) || !get_sub_field( 'member_only_section' ) ) {

	$leadershipTypes = get_terms( array( 'taxonomy' => 'leadership_type', 'orderby' => 'term_id' ) );

	foreach ( $leadershipTypes as $leadershipTermObj ) {
		
		// dynamically build the query from terms
		$leadershipQuery = array(
			"post_type" => 'leadership',
			"post_status" => 'publish',
			"posts_per_page" => -1,
			"orderby" => "menu_order",
			"order" => "DESC",
			"tax_query" => array(
				array(
					"taxonomy" => "leadership_type",
					"field"    => "slug",
					"terms"    => $leadershipTermObj->slug
				)
			)
		);

		$leadershipPosts = new WP_Query( $leadershipQuery );

		if ( $leadershipPosts->have_posts() ) {
			$i = 0;
			while ( $leadershipPosts->have_posts() ) {
				$leadershipPosts->the_post();
				$leaderTypeName = $leadershipTermObj->name;

				$model[$leaderTypeName][$i]['name'] = get_the_title();
				$model[$leaderTypeName][$i]['title'] = get_field( 'title' );
				$model[$leaderTypeName][$i]['pictureUrl'] = get_field( 'picture' )['url'];
				$model[$leaderTypeName][$i]['streetAddress'] = get_field( 'street_address' );
				$model[$leaderTypeName][$i]['city'] = get_field( 'city' );
				$model[$leaderTypeName][$i]['state'] = get_field( 'state' );
				$model[$leaderTypeName][$i]['postalCode'] = get_field( 'postal_code' );
				if ( have_rows( 'phone_numbers' ) ) {
					$j = 0;
					while ( have_rows( 'phone_numbers' ) ) {
						the_row();
						$model[$leaderTypeName][$i]['phoneNumbers'][$j]['type'] = get_sub_field( 'type' );
						$model[$leaderTypeName][$i]['phoneNumbers'][$j]['phoneNumber'] = get_sub_field( 'phone_number' );
						$j++;
					}
				}
				$model[$leaderTypeName][$i]['emailAddress'] = get_field( 'email_address' );
				$model[$leaderTypeName][$i]['about'] = get_field( 'about' );
				$i++;
			}
		}

		// reset to the original WP post data
		wp_reset_postdata();
	}
}
?>