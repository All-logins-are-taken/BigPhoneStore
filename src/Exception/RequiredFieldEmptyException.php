<?php

namespace BigPhoneStore\src\Exception;

use Exception;

class RequiredFieldEmptyException extends Exception
{

    private string $title;

    private int $row;

    public function __construct(string $title, int $row)
    {
        $this->title = $title;
        $this->row = $row;

        parent::__construct();
    }

    public function __toString(): string
    {
        return $this->title . ' name is empty in row: ' . $this->row;
    }

}
