<?php
namespace ElementPack\Modules\FancyWide;

use ElementPack\Base\Element_Pack_Module_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Module extends Element_Pack_Module_Base {

	public function get_name() {
		return 'fancy-wide';
	}

	public function get_widgets() {
		$widgets = [
			'Fancy_Wide',
		];

		return $widgets;
	}
}
