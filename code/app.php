#!/usr/bin/env php

<?php

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use Advent\Day1;
use Advent\Day2;
use Advent\Day4;

$application = new Application();

$application->add(new Day1\SolutionA());
//$application->add(new Day1\SolutionB());
$application->add(new Day2\SolutionA());
$application->add(new Day4\SolutionA());


$application->run();
