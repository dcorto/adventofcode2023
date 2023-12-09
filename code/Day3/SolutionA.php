<?php declare(strict_types = 1);

namespace Advent\Day3;

use Advent\Common;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'solution:3:a')]
class SolutionA extends Common {

    private const EMPTY = ".";
    private const SYMBOLS = ["*","#","+","$"];

    public function performSolution(array $input): int 
    {
        $solution = 0;
        $matrix = $this->getMatrix($input);
        print_r($matrix);
        for($i=0;$i<count($matrix);$i++){
            for($j=0;$j<count($matrix[$i]);$j++){
                $current = $matrix[$i][$j];        
                if(in_array($current, self::SYMBOLS)){
                    //Look up
                    echo "Found symbol: $current at position $i $j" . PHP_EOL;
                    //find same line:
                    $solution += $this->findSameLine($matrix, $i, $j);
                    //find upper line:
                    $solution += $this->findUpperLine($matrix, $i, $j);
                    //find lower line:
                    $solution += $this->findLowerLine($matrix, $i, $j);
                }
            }
        }

        return $solution;
    }

    private function getMatrix(array $input): array
    {
        $matrix = [];
        foreach($input as $line) {
            $matrix[] = str_split($line);
        }
        return $matrix;
    }

    private function findSameLine(array $matrix, int $line, int $col): int
    {
        $currentLine = $line;
        $currentCol = $col;

        //to right
        $digitsR = "";
        for($i=$col;$i<count($matrix[$line]);$i++){
            $current = $matrix[$line][$i];
            if(in_array($current, self::SYMBOLS)) {
                $break = false;
                continue;
            }
            if($current != self::EMPTY) {
                $digitsR .= $current;
                //echo "digitsR $digitsR" . PHP_EOL;
                continue;
            }
            break;
        }

        $digitsL = "";
        //to left
        for($i=$col;$i>=0;$i--){
            $current = $matrix[$line][$i];
            if(in_array($current, self::SYMBOLS)) {
                $break = false;
                continue;
            }
            if($current != self::EMPTY) {
                $digitsL = $current . $digitsL;
                echo "digitsL $digitsL" . PHP_EOL;
                continue;
            }
            break;
        }

        return intval($digitsR) + intval($digitsL);
    }

    private function findUpperLine(array $matrix, int $line, int $col): int
    {
        return 0;
    }

    private function findLowerLine(array $matrix, int $line, int $col): int
    {
        return 0;
    }

    protected function getPath(): string 
    {
        return __DIR__;
    }
}
