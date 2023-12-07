<?php

namespace BigPhoneStore\src\Service;

use BigPhoneStore\src\Entity\Product;
use BigPhoneStore\src\Exception\FileExtensionNotValidException;
use BigPhoneStore\src\Exception\FileNotFoundException;
use BigPhoneStore\src\Exception\HeadingNotFoundException;
use BigPhoneStore\src\Exception\ParameterNotFoundException;
use BigPhoneStore\src\Parser\Parser;

class InputHandler
{

    private const FILE_FOLDER_PATH = './files/';

    private const VALID_EXTENSIONS = ['csv', 'tsv', 'xml', 'json'];

    private const MANDATORY_PARAMETERS = ['file', 'headings'];

    private const MANDATORY_HEADINGS = ['make', 'model'];

    private array $parameters;

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @throws HeadingNotFoundException
     * @throws FileNotFoundException
     * @throws ParameterNotFoundException
     * @throws FileExtensionNotValidException
     */
    public function process(): void
    {
        foreach (self::MANDATORY_PARAMETERS as $mandatoryParameter) {
            if (!in_array($mandatoryParameter, array_keys($this->parameters))) {
                throw new ParameterNotFoundException($mandatoryParameter);
            }
        }

        $file = $this->parameters['file'];
        $extension = explode('.', $file)[1];
        $filePath = self::FILE_FOLDER_PATH . $file;
        $headings = $this->parameters['headings'];
        $uniqueCombination = $this->parameters['unique-combinations'] ?? '';
        $uniqueCombinationExtension = explode('.', $uniqueCombination)[1];
        $headingArray = explode('#', $headings);

        if (!file_exists($filePath)) {
            throw new FileNotFoundException('File');
        } elseif (!in_array($extension, self::VALID_EXTENSIONS)) {
            throw new FileExtensionNotValidException($extension);
        }

        foreach (self::MANDATORY_HEADINGS as $mandatoryHeading) {
            if (!in_array($mandatoryHeading, $headingArray)) {
                throw new HeadingNotFoundException($mandatoryHeading);
            }
        }

        if ($uniqueCombinationExtension !== 'csv') {
            throw new FileExtensionNotValidException('for unique combination file - ' . $uniqueCombinationExtension);
        }

        $orderedHeadings = [];

        foreach ($headingArray as $key => $heading) {
            $orderedHeadings[$heading] = $key;
        }

        $this->parse($extension, self::FILE_FOLDER_PATH, $file, $orderedHeadings, $uniqueCombination);
    }

    /**
     * @throws FileNotFoundException
     */
    private function parse(string $extension, string $filePath, string $file, array $headings, string $outputFile): void
    {
        $parser = new Parser(new FileHandler(new Product()));
        $parser->parseFile($extension, $filePath, $file, $headings, $outputFile);
    }

}
