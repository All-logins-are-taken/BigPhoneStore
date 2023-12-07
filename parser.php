<?php

namespace BigPhoneStore;

use BigPhoneStore\src\Service\InputHandler;

require 'autoload.php';

$parameterArray = getopt('', ['file:', 'headings:', 'unique-combinations::']);
$inputHandler = new InputHandler($parameterArray);
$inputHandler->process();
