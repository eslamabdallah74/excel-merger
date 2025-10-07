# Excel Merger

A simple and efficient PHP library for merging multiple Excel files into a single workbook. Built with PhpSpreadsheet for reliable Excel file handling.

## Features

- ✅ Merge multiple Excel files (.xlsx) into one workbook
- ✅ Preserve all worksheets from source files
- ✅ Automatic sheet naming with sequential numbering
- ✅ Maintains data integrity and formatting
- ✅ Simple and clean API
- ✅ Composer ready

## Installation

### Using Composer

```bash
composer require eslamabass/excel-merger
```

### Manual Installation

1. Clone this repository:
```bash
git clone https://github.com/eslamabdallah74/excel-merger.git
cd excel-merger
```

2. Install dependencies:
```bash
composer install
```

## Usage

### Basic Usage

```php
<?php

require 'vendor/autoload.php';

use Eslam\ExcelMerger\ExcelMerger;

// Define the Excel files to merge
$files = [
    'path/to/file1.xlsx',
    'path/to/file2.xlsx',
    'path/to/file3.xlsx'
];

// Create merger instance
$merger = new ExcelMerger($files);

// Merge files and save to output
$merger->merge('path/to/merged_output.xlsx');

echo "Files merged successfully!";
```

### Advanced Usage

```php
<?php

use Eslam\ExcelMerger\ExcelMerger;

// Multiple files with different sheets
$files = [
    __DIR__ . '/data/sales.xlsx',      // Contains "Sales Q1" sheet
    __DIR__ . '/data/customers.xlsx',  // Contains "Customers" sheet  
    __DIR__ . '/data/products.xlsx'    // Contains "Products" sheet
];

$merger = new ExcelMerger($files);
$merger->merge(__DIR__ . '/output/combined_report.xlsx');
```

## How It Works

The Excel Merger takes multiple Excel files and combines them into a single workbook:

1. **First File**: The first worksheet from the first file becomes "Sheet_1"
2. **Subsequent Files**: All worksheets from remaining files become "Sheet_2", "Sheet_3", etc.
3. **Data Preservation**: All cell data, formatting, and structure are maintained
4. **Sheet Naming**: Automatic sequential naming (Sheet_1, Sheet_2, Sheet_3...)

## Example

### Input Files
- `sales.xlsx` (contains sales data)
- `customers.xlsx` (contains customer information)

### Output
- `merged.xlsx` with:
  - Sheet_1: Sales data
  - Sheet_2: Customer data

## Requirements

- PHP 8.0 or higher
- PhpSpreadsheet library
- Composer (for dependency management)

## Dependencies

- [PhpOffice/PhpSpreadsheet](https://github.com/PHPOffice/PhpSpreadsheet) - Excel file manipulation

## Testing

Run the test script to verify everything works:

```bash
php tests/test.php
```

This will:
1. Create sample Excel files with test data
2. Merge them using the ExcelMerger
3. Generate a merged output file

## API Reference

### ExcelMerger Class

#### Constructor
```php
public function __construct(array $files)
```
- `$files` - Array of file paths to merge

#### Methods

##### merge()
```php
public function merge(string $outputPath): void
```
- `$outputPath` - Path where the merged file will be saved
- Merges all input files into a single Excel workbook

## Error Handling

The library handles common errors gracefully:

- **File not found**: Throws exception if input files don't exist
- **Invalid Excel format**: Validates file format before processing
- **Memory issues**: Efficient memory usage for large files

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Changelog

### v1.0.0
- Initial release
- Basic Excel file merging functionality
- Support for .xlsx files
- Automatic sheet naming

## Support

If you encounter any issues or have questions:

1. Check the [Issues](https://github.com/eslamabdallah74/excel-merger/issues) page
2. Create a new issue with detailed description
3. Include sample files if possible

## Roadmap

- [ ] Support for .xls files (legacy Excel format)
- [ ] Custom sheet naming options
- [ ] Merge with specific sheet selection
- [ ] Data validation and error reporting
- [ ] Memory optimization for very large files

---

Made with ❤️ by [Eslam Abass](https://github.com/eslamabdallah74)
