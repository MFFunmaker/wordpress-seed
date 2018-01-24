<?php
namespace ContentBlocks;

require_once get_template_directory() . '/templates/models/ContentBlockModel.class.php';

class ContentBlockController
{
	static function getContentBlock( $section_name )
	{
		// grab the necessary variables, if any
		$model[$section_name] = ContentBlockModel::getSectionVariables( $section_name );

		// pull in partials based on layout type
		require get_template_directory() . '/templates/views/' . $section_name . '.php';
	}

	static function getPartialBlock( $partialName, $model=null ) {

		// grab the necessary variables, if any
		if ( is_null( $model ) ) {
			$partialModel[$partialName] = ContentBlockModel::getPartialVariables( $partialName );
		}

		// pull in partials based on layout type
		require get_template_directory() . '/templates/views/_partials/' . $partialName . '.inc.php';
	}
}

?>
