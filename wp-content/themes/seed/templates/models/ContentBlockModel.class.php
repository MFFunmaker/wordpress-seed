<?php
namespace ContentBlocks;
use WP_Query; // so instantiating WP_Query object doesn't try to use our custom class namespace

class ContentBlockModel
{

	static function getSectionVariables( $sectionName )
	{
		$model = array();
		include '_partials/' . $sectionName . '.inc.php';
		return $model;
	}

	static function getPartialVariables( $partialName ) {
		
		$partialModel = array();
		switch ( $partialName ) {
			default:
				break;
		}
		return $partialModel;
	}
}

?>
