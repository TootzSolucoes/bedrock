<?php

use Symfony\Component\Yaml\Parser;

add_action('after_setup_theme', function () {
	$yaml = new Parser();
	$translations_yml = $yaml->parse( file_get_contents( __DIR__ . '/translations.yml' ) );

	if (is_iterable($translations_yml)) {
		foreach($translations_yml as $group => $strings) {
			if (is_iterable($strings)) {
				foreach($strings as $name => $string) {
					pll_register_string($name, $string, $group);
				}
			}
		}
	}
});
