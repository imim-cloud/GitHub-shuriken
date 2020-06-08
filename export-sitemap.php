<?php
ini_set("memory_limit", "-1");
set_time_limit(0);
// prevent browser
if(PHP_SAPI !== 'cli'){ die; }

require 'vendor/autoload.php';
require 'helpers.php';

echo "=> generating data for sitemap xml\n";

file_put_contents('export/sitemap.xml', view('export.sitemap', [
	'keywords' => keywords(),
	'argv' => $argv
], false));