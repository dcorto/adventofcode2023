<?php declare(strict_types = 1);

namespace Advent\Day1;

use Advent\Common;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'solution:1:a')]
class SolutionA extends Common {

    private const EMPTY = PHP_EOL;

    #protected static $defaultName = 'solution:1:a';

    public function performSolution(array $input): int 
    {
        $solution = 0;
        foreach($input as $line){
            $digits = $this->digitsFromLine($line);
            $solution += $digits;
        }

        return $solution;
    }

    private function digitsFromLine(string $line): int {
        $d1 = null;
        $d2 = null;
        $numbers = [0,1,2,3,4,5,6,7,8,9];
        $array = str_split($line);
        
        for($i=0;$i<count($array);$i++){
            if(in_array($array[$i], $numbers)){
                $d1 = $array[$i];
                break;
            }
        }

        for($i=count($array)-1;$i>=0;$i--){
            if(in_array($array[$i], $numbers)){
                $d2 = $array[$i];
                break;
            }
        }

        return intval($d1.$d2);
    }

    protected function getPath(): string 
    {
        return __DIR__;
    }
}
