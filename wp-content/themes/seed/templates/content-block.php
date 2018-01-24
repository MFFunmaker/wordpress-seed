<?php
require_once 'controllers/ContentBlockController.class.php';
?>

<?php
if ( have_rows( 'content_block' ) ) {
	while ( have_rows( 'content_block' ) ) {
		the_row();

		// grab the section name
		$section_name = get_row_layout();

		// replace ACF name underscores with hyphens so it follows our partial file
		// naming convention and works dynamically...
		$section_name = str_replace( '_', '-', $section_name );

		// ... in this function's require statement
		ContentBlocks\ContentBlockController::getContentBlock( $section_name );
	}
}
?>
