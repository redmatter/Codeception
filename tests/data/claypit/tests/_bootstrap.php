<?php
require_once __DIR__.'/_data/MyGroupHighlighter.php';
require_once __DIR__.'/_data/VerbosityLevelOutput.php';

$orderFile = \Codeception\Configuration::outputDir().'order.txt';
if (file_exists($orderFile) && !unlink($orderFile)) {
    throw new \RuntimeException("Failed to delete $orderFile");
}

$fh = fopen($orderFile, 'a');
if ($fh === false) {
    throw new \RuntimeException("Failed to open $orderFile for writing");
}
if (fwrite($fh, 'B') === false) {
    throw new \RuntimeException("Failed to write to $orderFile");
}
fclose($fh);
