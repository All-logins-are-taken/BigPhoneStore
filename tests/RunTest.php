<?php

namespace BigPhoneStore\tests;

use BigPhoneStore\src\Entity\Product;
use BigPhoneStore\src\Exception\ParameterNotFoundException;
use BigPhoneStore\src\File\TsvFile;
use BigPhoneStore\src\Service\FileHandler;
use Exception;

class RunTest
{

    const MANDATORY_PARAMETERS = ['t'];

    private array $parameters;

    /**
     * @throws ParameterNotFoundException
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
        $this->init();
    }

    /**
     * @throws ParameterNotFoundException
     * @throws Exception
     */
    public function init()
    {
        foreach (self::MANDATORY_PARAMETERS as $mandatoryParameter) {
            if (!in_array($mandatoryParameter, array_keys($this->parameters))) {
                throw new ParameterNotFoundException($mandatoryParameter);
            }
        }

        if (!empty($this->parameters['t'])) {
            if ($this->parameters['t'] === 'tsv') {
                $tsvFileTest = new TsvFileTest(new TsvFile(new FileHandler(new Product())));

                $tsvFileTest->TsvFileJustRead();
                $tsvFileTest->TsvFileReadAndWrite();
                $tsvFileTest->TsvFileJustWrite();
            }
        }
    }

}
