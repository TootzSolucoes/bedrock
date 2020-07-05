<?php

use Symfony\Component\Yaml\Parser;

add_action('after_setup_theme', function () {
	$yaml = new Parser();
	$translations_yml = $yaml->parse( file_get_contents( __DIR__ . '/translations.yml' ) );

	foreach($translations_yml as $group => $strings) {
		foreach($strings as $name => $string) {
			pll_register_string($name, $string, $group);
		}
	}
});
