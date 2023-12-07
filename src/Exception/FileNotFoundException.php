<?php

namespace BigPhoneStore\src\Exception;

use Exception;

class FileNotFoundException extends Exception
{

    private string $title;

    public function __construct(string $title)
    {
        $this->title = $title;

        parent::__construct();
    }

    public function __toString(): string
    {
        return $this->title . ' not found';
    }

}