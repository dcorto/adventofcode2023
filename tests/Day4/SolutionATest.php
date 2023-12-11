<?php declare(strict_types=1);

namespace Test\Day4;

use PHPUnit\Framework\TestCase;
use Advent\Day4;

final class SolutionATest extends TestCase
{
    public function testInstance(): void
    {
        $sut = new Day4\SolutionA();        
        $this->assertInstanceOf(
            Day4\SolutionA::class,
            $sut
        );
    }

    public function testSolution(): void
    {
        $expected = 13;
        $sut = new Day4\SolutionA();    
        $input = $this->loadInput(__DIR__."/input.txt");
        $actual = $sut->performSolution($input);
        $this->assertEquals($expected, $actual);
    }

    protected function loadInput($filename): array {
        $lines = [];
        $fp = fopen($filename, "r") or die ('Unable to open file ' . $filename);

        while(!feof($fp)) {       
            $line = fgets($fp);
            if($line != "\n") {
                $line = trim($line);
            }
            $lines[] = $line;
        }

        return $lines;
    }
}