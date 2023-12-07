<?php

namespace BigPhoneStore\src\File;

class FileHandler
{

    private File $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function read(string $filePath, string $file, array $headings, string $outputFile): array
    {
        return $this->file->read($filePath, $file, $headings, $outputFile);
    }

    public function write(array $data, string $path): void
    {
        $this->file->write($data, $path);
    }

}
