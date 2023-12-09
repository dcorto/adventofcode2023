<?php declare(strict_types = 1);

namespace Advent\Day2;

use Advent\Common;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'solution:2:a')]
class SolutionA extends Common {

    private const EMPTY = PHP_EOL;

    private const RED_CUBES = 12;
    private const GREEN_CUBES = 13;
    private const BLUE_CUBES = 14;

    public function performSolution(array $input): int 
    {
        $solution = 0;
        foreach($input as $game){
            $gameId = $this->getGameIdIfCorrect($game);
            //echo $gameId . PHP_EOL;
            $solution += $gameId;
        }

        return $solution;
    }

    private function getGameIdIfCorrect(string $game): int {
        
        $gameId = $this->getGameId($game);
        $sets = $this->getGameSets($game);

        //$green = 0;
        //$blue = 0;
        //$red = 0;

        foreach($sets as $set) {
            $green = $this->getColorCountFromSet($set, 'green');
            $blue = $this->getColorCountFromSet($set, 'blue');
            $red = $this->getColorCountFromSet($set, 'red');
            
            //Check if is still a valid game given this set
            if(!$this->checkIfGameIsStillCorrect($green, $blue, $red)) {
               return 0; 
            }
        }

        return $gameId;
    }

    private function checkIfGameIsStillCorrect(int $currentGreen, int $currentBlue, int $currentRed): bool
    {
        if($currentBlue > self::BLUE_CUBES) {
            return false;
        }

        if($currentGreen > self::GREEN_CUBES) {
            return false;
        }

        if($currentRed > self::RED_CUBES) {
            return false;
        }

        return true;
    }

    private function getGameId(string $game): int 
    {
        $array = explode(":", $game);
        return intval(preg_replace("/[^0-9]/", "", $array[0]));
    }

    private function getGameSets(string $game): array
    {
        $array = explode(":", $game);
        return explode(";", $array[1]);
    }

    private function getColorCountFromSet(string $set, string $colour): int
    {
        $count = 0;
        $cubes = explode(",", $set);
        foreach($cubes as $cube) {
            if (str_contains($cube, $colour)) {
                $count = intval(preg_replace("/[^0-9]/", "", $cube));
            }
        }
        return $count;
    }

    protected function getPath(): string 
    {
        return __DIR__;
    }
}
