<?php

namespace BigPhoneStore\src\File;

use BigPhoneStore\src\Service\FileHandler;

class XmlFile implements File
{

    private FileHandler $fileHandlerService;

    public function __construct(FileHandler $fileHandlerService)
    {
        $this->fileHandlerService = $fileHandlerService;
    }

    public function read(string $filePath, string $file, array $headings, string $outputFile): array
    {
        // TODO: Implement read() method.
        return ['Xml parser not implemented yet'];
    }

    public function write(array $data, string $path): void
    {
        // TODO: Implement write() method.
    }

}
