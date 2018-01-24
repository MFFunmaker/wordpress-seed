<?php
$user = wp_get_current_user();
if ( ( get_sub_field( 'member_only_section' ) && ( in_array( 'member', (array) $user->roles ) || in_array( 'business_member', (array) $user->roles ) ) ) || !get_sub_field( 'member_only_section' ) ) {
	if ( have_rows( 'tab_section' ) ) {
		$i = 0;
		while ( have_rows( 'tab_section' ) ) {
			the_row();
			if ( ( get_sub_field( 'member_only_section' ) && ( in_array( 'member', (array) $user->roles ) || in_array( 'business_member', (array) $user->roles ) ) ) || !get_sub_field( 'member_only_section' ) ) {
				$model['tabSection'][$i]['tabStyle'] = get_sub_field( 'tab_style' );
				$model['tabSection'][$i]['tabLabel'] = get_sub_field( 'tab_label' );

				if ( have_rows( 'tab_content' ) ) {
					$j = 0;
					while ( have_rows( 'tab_content' ) ) {
						the_row();
						$contentRowLayout = get_row_layout();
						$contentRowLayout = str_replace( '_', '-', $contentRowLayout );
						include '_tabbed-content-partials/' . $contentRowLayout . '.inc.php';
						$j++;
					}
				}
			}
			$i++;
		}
	}
}
?>