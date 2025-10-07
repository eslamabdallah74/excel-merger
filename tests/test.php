<?php

require __DIR__ . '/../vendor/autoload.php';

use Eslam\ExcelMerger\ExcelMerger;

$files = [
    __DIR__ . '/file1.xlsx',
    __DIR__ . '/file2.xlsx'
];

$merger = new ExcelMerger($files);
$merger->merge(__DIR__ . '/merged.xlsx');

echo "Merged successfully\n";
