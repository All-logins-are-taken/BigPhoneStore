<?php

namespace BigPhoneStore\src\Service;

use BigPhoneStore\src\Entity\Product;
use BigPhoneStore\src\Exception\RequiredFieldEmptyException;

class FileHandler
{

    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @throws RequiredFieldEmptyException
     */
    public function readCsv(string $file, array $headings, string $outputFile, string $separator): array
    {
        $row = 0;
        $uniqueRow = 0;
        $count = 1;
        $productArray = [];
        $uniqueProductArray = [];
        $import = fopen($file, 'r');

        while ($data = fgetcsv($import, 4096, $separator)) {
            $row++;

            if ($row == 1) {
                continue;
            }

            if (empty($data[$headings['make']])) {
                throw new RequiredFieldEmptyException('Brand', $row);
            } elseif (empty($data[$headings['model']])) {
                throw new RequiredFieldEmptyException('Model', $row);
            }

            $this->product->setMake($data[$headings['make']]);
            $this->product->setModel($data[$headings['model']]);
            $this->product->setColour($data[$headings['colour']] ?? '-');
            $this->product->setCapacity($data[$headings['capacity']] ?? '-');
            $this->product->setNetwork($data[$headings['network']] ?? '-');
            $this->product->setGrade($data[$headings['grade']] ?? '-');
            $this->product->setCondition($data[$headings['condition']] ?? '-');

            $productArray[$row] = $this->product->getProduct();

            if (!empty($outputFile)) {
                if ($row > 2 && $productArray[$row] === $productArray[$row - 1]) {
                    $count++;
                } else {
                    $uniqueProductArray[$uniqueRow] = $this->product->getProduct();

                    if ($uniqueRow > 0) {
                        $uniqueProductArray[$uniqueRow - 1] = $uniqueProductArray[$uniqueRow - 1] . $count;
                    }

                    $count = 1;
                    $uniqueRow++;
                }
            }
        }

        if (!empty($outputFile)) {
            $uniqueProductArray[$uniqueRow - 1] = $uniqueProductArray[$uniqueRow - 1] . $count;
        }

        return [$uniqueProductArray, $productArray];
    }

    public function writeCsv(array $data, string $path): void
    {
        $fp = fopen($path, 'wb');
        fputcsv($fp, Product::HEADINGS);

        foreach ($data as $line) {
            $val = explode("\n", $line);
            fputcsv($fp, $val);
        }

        fclose($fp);
    }

}
