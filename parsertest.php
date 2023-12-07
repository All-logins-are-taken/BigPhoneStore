<?php

namespace BigPhoneStore;

use BigPhoneStore\tests\RunTest;

require 'autoload.php';

$parameterArray = getopt('t:');
new RunTest($parameterArray);
