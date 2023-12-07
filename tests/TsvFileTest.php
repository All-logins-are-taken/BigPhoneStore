<?php

namespace BigPhoneStore\tests;

use BigPhoneStore\src\File\TsvFile;
use Exception;

class TsvFileTest
{

    private const TEST_HEADINGS = [
        'make' => 0,
        'model' => 1,
        'colour' => 5,
        'capacity' => 4,
        'network' => 6,
        'grade' => 3,
        'condition' => 2,
        'count' => 7
    ];

    private const FILE_PATH = 'files/';

    private TsvFile $tsvFile;

    public function __construct(TsvFile $tsvFile)
    {
        $this->tsvFile = $tsvFile;
    }

    /**
     * @throws Exception
     */
    public function TsvFileJustRead(): void
    {
        echo print_r(
                $this->tsvFile->read(self::FILE_PATH, 'products_tab_separated_test.tsv', self::TEST_HEADINGS, ''),
                true
            ) . "\n !!!Reading test passed successfully!!!\n\n";
    }

    /**
     * @throws Exception
     */
    public function TsvFileReadAndWrite(): void
    {
        echo print_r(
                $this->tsvFile->read(
                    self::FILE_PATH,
                    'products_tab_separated_test.tsv',
                    self::TEST_HEADINGS,
                    'combination_count_test_write.csv'
                ),
                true
            ) . "\nYou can check file " . self::FILE_PATH . "combination_count_test_read.csv\n\n";
    }

    public function TsvFileJustWrite(): void
    {
        $this->tsvFile->write(["ZTE\nZTE 18288-2000\nGreen\nNot Applicable\nNot Applicable\nBrand New\nBrand New\n1"],
            self::FILE_PATH . 'combination_count_only_test_write.csv');

        echo "\nYou can check file " . self::FILE_PATH . "combination_count_only_test_write.csv\n\n";
    }

}
