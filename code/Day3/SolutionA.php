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
                    //echo "Found symbol: $current at position $i $j" . PHP_EOL;
                    //find same line:
                    //$solution += $this->findSameLine($matrix, $i, $j);
                    
                    //find upper line:
                    //$pepe = $this->findUpperLine($matrix, $i, $j);
                    //echo "pepe $pepe" . PHP_EOL;
                    $solution += $pepe;
                    
                    //find lower line:
                    $pepe = $this->findLowerLine($matrix, $i, $j);
                    echo "pepe $pepe" . PHP_EOL;
                    $solution += $pepe;
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

        //to left
        $digitsL = "";
        for($i=$col;$i>=0;$i--){
            $current = $matrix[$line][$i];
            if(in_array($current, self::SYMBOLS)) {
                $break = false;
                continue;
            }
            if($current != self::EMPTY) {
                $digitsL = $current . $digitsL;
                //echo "digitsL $digitsL" . PHP_EOL;
                continue;
            }
            break;
        }

        return intval($digitsR) + intval($digitsL);
    }

    private function findUpperLine(array $matrix, int $line, int $col): int
    {
        
        if($line <= 0) {
            return 0;
        }

        $currentLine = ($line-1);
        $currentCol = $col;
        $positions = [];
        //to right
        $digitsR = "";
        for($i=$col;$i<count($matrix[$currentLine]);$i++){
            $current = $matrix[$currentLine][$i];
            if(in_array($current, self::SYMBOLS)) {                
                continue;
            }
            if($current != self::EMPTY && !in_array($i, $positions)) {
                $digitsR .= $current;
                $positions[] = $i;
                echo "digitsR $digitsR" . PHP_EOL;
                continue;
            }
            if($i === $col) {
                continue;
            }
            break;
        }

        //to left
        $digitsL = "";
        for($i=$col;$i>=0;$i--){
            $current = $matrix[$currentLine][$i];
            if(in_array($current, self::SYMBOLS)) {                
                continue;
            }
            if($current != self::EMPTY && !in_array($i, $positions)) {
                $digitsL = $current . $digitsL;
                $positions[] = $i;
                echo "digitsL $digitsL" . PHP_EOL;
                continue;
            }
            if($i === $col) {
                continue;
            }

            break;
        }

        return intval($digitsR) + intval($digitsL);
    }

    private function findLowerLine(array $matrix, int $line, int $col): int
    {
        if($line >= count($matrix)) {
            return 0;
        }

        $currentLine = ($line+1);
        $currentCol = $col;
        $positions = [];

        //to right
        $digitsR = "";
        for($i=$col;$i<count($matrix[$currentLine]);$i++){
            $current = $matrix[$currentLine][$i];
            if(in_array($current, self::SYMBOLS)) {                
                continue;
            }
            if($current != self::EMPTY && !in_array($i, $positions)) {
                $digitsR .= $current; 
                $positions[] = $i;
                echo "digitsR $digitsR" . PHP_EOL;               
                continue;
            }
            if($i === $col) {
                continue;
            }

            break;
        }

        //to left
        $digitsL = "";
        for($i=$col;$i>=0;$i--){
            $current = $matrix[$currentLine][$i];
            if(in_array($current, self::SYMBOLS)) {                
                continue;
            }
            if($current != self::EMPTY && !in_array($i, $positions)) {
                $digitsL = $current . $digitsL;
                $positions[] = $i;
                echo "digitsL $digitsL" . PHP_EOL;
                continue;
            }
            if($i === $col) {
                continue;
            }

            break;
        }

        return intval($digitsR) + intval($digitsL);

    }

    protected function getPath(): string 
    {
        return __DIR__;
    }
}
