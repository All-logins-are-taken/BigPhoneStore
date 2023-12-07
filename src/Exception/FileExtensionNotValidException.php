<?php

namespace BigPhoneStore\src\Exception;

use Exception;

class FileExtensionNotValidException extends Exception
{
    private string $title;

    public function __construct(string $title)
    {
        $this->title = $title;

        parent::__construct();
    }

    public function __toString(): string
    {
        return 'File extension ' . $this->title . ' is not valid';
    }
}