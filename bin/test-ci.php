#!/usr/bin/env php
<?php

$travis  = preg_split('@\nscript:\n\s+(?=[#-]\s+)@', file_get_contents(__DIR__.'/../.travis.yml'), 2);
$scripts = $travis[1];

$exitCode = 0;


// Remove comments
$scripts = preg_replace('@\s*#[^\n]+@', '', $scripts);
$scripts = preg_replace('@\n{2,}@', "\n", $scripts);

// Split in commands and remove empty lines
$scripts = array_filter(preg_split('@\n\s+\-\s+@', $scripts));

foreach ($scripts as $item) {
    $returnVar = 0;
    system($item, $returnVar);
    $exitCode += $returnVar;
}

exit($exitCode);
