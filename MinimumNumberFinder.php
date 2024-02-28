<?php
namespace frontend\modules\api\leprica\recourses;


class MinimumNumberFinder
{
    private $filterArray;

    public function __construct(array $filterArray)
    {
        $this->filterArray = $filterArray;
        sort($this->filterArray);
    }

    public function findWithMax(int $number): int
    {
        $filtered = array_filter($this->filterArray, static function ($item) use ($number) {
            return $item < $number;
        });

        return $this->maxOrDefault($filtered);
    }

    public function findWithMap(int $number): int
    {
        $filtered = array_map(static function ($item) use ($number) {
            return $item < $number ? $item : null;
        }, $this->filterArray);
        $filtered = array_filter($filtered);
        return $this->maxOrDefault($filtered);
    }

    public function findWithReduce(int $number): int
    {
        return array_reduce($this->filterArray, function ($max, $item) use ($number) {
            return $this->updateMax($item, $number, $max);
        }, $this->defaultResponse());
    }

    public function findWithWalk(int $number): int
    {
        $max = $this->defaultResponse();
        array_walk($this->filterArray, function ($item) use ($number, &$max) {
            $max = $this->updateMax($item, $number, $max);
        });
        return $max;
    }


    public function findWithCycle(int $number): int
    {
        $max = $this->defaultResponse();
        foreach ($this->filterArray as $item) {
            $max = $this->updateMax($item, $number, $max);
        }
        return $max;
    }

    public function findWithShift(int $number): int
    {
        $max = $this->defaultResponse();
        while (!empty($this->filterArray)) {
            $item = array_shift($this->filterArray);
            $max = $this->updateMax($item, $number, $max);
        }
        return $max;
    }

    private function defaultResponse(): int
    {
        return -1;
    }

    private function maxOrDefault($filtered): int
    {
        return $filtered ? max($filtered) : $this->defaultResponse();
    }

    private function updateMax($item, $number, $max): int
    {
        return $item < $number && $item > $max ? $item : $max;
    }
}