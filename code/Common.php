<?php declare(strict_types = 1);

namespace Advent;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class Common extends Command {

    abstract public function performSolution(array $input): int;

    abstract protected function getPath(): string;
    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $input = $this->loadInput($this->getPath() . "/input.txt");
        $solution = $this->performSolution($input);                
        $this->printSolution((string) $solution);
        return Command::SUCCESS;
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

    protected function printSolution(string $solution): void {
        echo "Solution is: " . $solution . PHP_EOL;
    }
}