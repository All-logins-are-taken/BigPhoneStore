<?php

namespace BigPhoneStore\src\Parser;

use BigPhoneStore\src\Exception\FileNotFoundException;
use BigPhoneStore\src\File\CsvFile;
use BigPhoneStore\src\File\JsonFile;
use BigPhoneStore\src\File\TsvFile;
use BigPhoneStore\src\File\XmlFile;
use BigPhoneStore\src\Service\FileHandler;

class Parser
{

    private array $formats = [
        'csv' => CsvFile::class,
        'tsv' => TsvFile::class,
        'xml' => XmlFile::class,
        'json' => JsonFile::class
    ];

    private FileHandler $fileHandlerService;

    public function __construct(FileHandler $fileHandlerService)
    {
        $this->fileHandlerService = $fileHandlerService;
    }

    /**
     * @throws FileNotFoundException
     */
    public function parseFile(string $format, string $filePath, string $file, array $headings, string $outputFile): void
    {
        $extension = $this->formats[$format] ?? '';

        if (empty($extension)) {
            throw new  FileNotFoundException('File extension');
        }

        $readerClass = $this->formats[$format];
        $reader = new $readerClass($this->fileHandlerService);
        print_r($reader->read($filePath, $file, $headings, $outputFile));
    }

}