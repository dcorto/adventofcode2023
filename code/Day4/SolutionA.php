<?php declare(strict_types = 1);

namespace Advent\Day4;

use Advent\Common;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'solution:4:a')]
class SolutionA extends Common {

    public function performSolution(array $input): int 
    {
        $solution = 0;

        foreach($input as $card) {            
            $w = $this->getWinningNumbersFromCard($card);
            $n = $this->getNumbersFromCard($card);

            $points = 0;
            foreach($n as $number){
                if(in_array($number, $w)) {
                    if($points >= 1) {
                        $points = $points*2;
                    }
                    else {
                        $points++;
                    }
                    //echo "new points: $points" . PHP_EOL;
                }
            }
            //echo "total points: $points " . PHP_EOL;

            $solution += $points;
        }

        return $solution;
    }

    private function getWinningNumbersFromCard(string $card): array
    {
        $a = explode(":", $card);
        $b = explode("|",$a[1]);
        $res = explode(" ", trim($b[0]));
        foreach($res as $key => $item) {
            if ($item === "") {
                unset($res[$key]);
            }
        }
        $res = array_values($res);
        return $res;
    }

    private function getNumbersFromCard(string $card): array
    {
        $a = explode(":", $card);
        $b = explode("|",$a[1]);
        $res = explode(" ", trim($b[1]));
        foreach($res as $key => $item) {
            if ($item === "") {
                unset($res[$key]);
            }
        }
        $res = array_values($res);
        return $res;
    }

    protected function getPath(): string 
    {
        return __DIR__;
    }
}
