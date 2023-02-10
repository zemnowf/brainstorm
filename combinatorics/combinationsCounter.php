<?php

class CombinationsCounter
{
    private array $inputs;
    private int $lengthOfCombination;
    private int $lengthOfInputs;
    private int $numberOfCombinations;
    private array $combinations;
    private array $combinationsArray;

    public function __construct($inputs, $length)
    {
        $this->inputs = str_split($inputs);
        $this->lengthOfCombination = $length;
        $this->lengthOfInputs = count($this->inputs);
        $this->numberOfCombinations = $this->getNumberOfCombinations($this->lengthOfInputs,
            $this->lengthOfCombination);
        $this->combinations = array();
        $this->combinationsArray = array();
    }

    public function getCombinations(): array
    {

        try {
            if ($this->lengthOfCombination > $this->lengthOfInputs) {
                throw new Exception("Length of combinations is greater than length of string");
            }
            if ($this->lengthOfInputs == 0 || $this->lengthOfCombination == 0) {
                throw new Exception("Length of combinations or of string must be more than 0");
            }

            foreach ($this->getCombination() as $value) {
                $this->combinations[] = $value;
            }

            for ($i = 0; $i < $this->numberOfCombinations; $i++) {
                $str = "";
                for ($j = 0; $j < $this->lengthOfCombination; $j++) {
                    $str = $str . $this->combinations[$i][$j];
                }
                $this->combinationsArray[] = $str;
            }

        } catch (Exception $e) {
            print($e->getMessage());
            echo "<br>";
        }

        return $this->combinationsArray;
    }

    private function getCombination($elements = array(), $keys = array()): Generator
    {
        foreach ($this->inputs as $key => $value) {

            if (in_array($key, $keys)) {
                continue;
            }

            $keys[] = $key;
            $elements[] = $value;

            if (count($elements) == $this->lengthOfCombination) {
                yield $elements;
            } else {
                foreach ($this->getCombination($elements, $keys) as $elementsAnother) {
                    yield $elementsAnother;
                }
            }

            array_pop($keys);
            array_pop($elements);
        }
    }

    function getNumberOfCombinations($n, $m)
    {
        return factorial($n) / (factorial($n - $m));
    }

}

function factorial($number)
{
    if ($number <= 1) {
        return 1;
    } else return ($number * factorial($number - 1));
}

$combo = new CombinationsCounter("ABCD", 2);
echo "<pre>";
print_r($combo->getCombinations());