#!/usr/bin/env php
<?php

$travis  = preg_split( '@\nscript:\n\s+\-\s+@', file_get_contents( __DIR__ . '/../.travis.yml' ), 2 );
$scripts = $travis[1];

$exitCode = 0;

foreach ( preg_split( '@\n\s+\-\s+@', $scripts ) as $item ) {
	$returnVar = 0;
	system( $item, $returnVar );
	$exitCode += $returnVar;
}

exit( $exitCode );
