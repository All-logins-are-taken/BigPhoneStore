<?php

namespace BigPhoneStore\src\Exception;

use Exception;

class HeadingNotFoundException extends Exception
{
    private string $title;

    public function __construct(string $title)
    {
        $this->title = $title;

        parent::__construct();
    }

    public function __toString(): string
    {
        return 'Please pass mandatory heading: ' . $this->title;
    }

}
