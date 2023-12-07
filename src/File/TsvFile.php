<?php

namespace BigPhoneStore\src\File;

use BigPhoneStore\src\Service\FileHandler;
use Exception;

class TsvFile implements File
{

    private FileHandler $fileHandlerService;

    public function __construct(FileHandler $fileHandlerService)
    {
        $this->fileHandlerService = $fileHandlerService;
    }

    /**
     * @throws Exception
     */
    public function read(string $filePath, string $file, array $headings, string $outputFile): array
    {
        $csvParsed = $this->fileHandlerService->readCsv($filePath . $file, $headings, $outputFile, "\t");

        if (!empty($outputFile)) {
            $this->write($csvParsed[0], $filePath. $outputFile);
        }

        return $csvParsed[1];
    }

    public function write(array $data, string $path): void
    {
        $this->fileHandlerService->writeCsv($data, $path);
    }

}
