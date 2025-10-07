<?php

namespace Eslam\ExcelMerger;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ExcelMerger
{
    protected array $files;

    public function __construct(array $files)
    {
        $this->files = $files;
    }
    public function merge(string $outputPath): void
    {
        $merged = new Spreadsheet();
        $index = 0;
        $firstSheet = true;
    
        foreach ($this->files as $file) {
            $spreadsheet = IOFactory::load($file);
    
            foreach ($spreadsheet->getAllSheets() as $sheet) {
                if ($firstSheet) {
                    // For the first sheet, replace the default sheet content
                    $defaultSheet = $merged->getActiveSheet();
                    $defaultSheet->fromArray($sheet->toArray());
                    $defaultSheet->setTitle('Sheet_' . ($index + 1));
                    $firstSheet = false;
                } else {
                    // For subsequent sheets, create new worksheets
                    $newSheet = $merged->createSheet();
                    $newSheet->fromArray($sheet->toArray());
                    $newSheet->setTitle('Sheet_' . ($index + 1));
                }
                $index++;
            }
        }
    
        $writer = IOFactory::createWriter($merged, 'Xlsx');
        $writer->save($outputPath);
    }
    
    
}
