#!/usr/bin/env php

<?php

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use Advent\Day1;

$application = new Application();

$application->add(new Day1\SolutionA());
//$application->add(new Day1\SolutionB());

$application->run();
