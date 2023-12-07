<?php

namespace BigPhoneStore\src\File;

interface File
{

    public function read(string $filePath, string $file, array $headings, string $outputFile): array;

    public function write(array $data, string $path): void;

}
