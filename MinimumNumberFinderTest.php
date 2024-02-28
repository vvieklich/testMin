<?php

use PHPUnit\Framework\TestCase;

class MinimumNumberFinderTest extends TestCase
{
    private $dataset = [3, 4, 6, 9, 10, 12, 14, 15, 17, 19, 21];

    /**
     * @dataProvider numberProvider
     */
    public function testFindMethods($method, $number, $expected): void
    {
        $finder = new MinimumNumberFinder($this->dataset);
        $this->assertEquals($expected, $finder->$method($number));
    }

    /**
     * @dataProvider invalidNumberProvider
     */
    public function testInvalidFormat($method, $number): void
    {
        $this->expectException(InvalidArgumentExceptio::class);
        $finder = new MinimumNumberFinder($this->dataset);
        $finder->$method($number);
    }

    public function invalidNumberProvider()
    {
        return [
            ['findWithMax', 'string'],
            ['findWithMax', null],
            ['findWithMax', []],
            ['findWithMax', '12a'],
            ['findWithMax', true],
            ['findWithMax', new stdClass()],
            ['findWithMap', 'string'],
            ['findWithMap', null],
            ['findWithMap', []],
            ['findWithMap', '12a'],
            ['findWithMap', true],
            ['findWithMap', new stdClass()],
            ['findWithReduce', 'string'],
            ['findWithReduce', null],
            ['findWithReduce', []],
            ['findWithReduce', '12a'],
            ['findWithReduce', true],
            ['findWithReduce', new stdClass()],
            ['findWithWalk', 'string'],
            ['findWithWalk', null],
            ['findWithWalk', []],
            ['findWithWalk', '12a'],
            ['findWithWalk', true],
            ['findWithWalk', new stdClass()],
            ['findWithCycle', 'string'],
            ['findWithCycle', null],
            ['findWithCycle', []],
            ['findWithCycle', '12a'],
            ['findWithCycle', true],
            ['findWithCycle', new stdClass()],
            ['findWithShift', 'string'],
            ['findWithShift', null],
            ['findWithShift', []],
            ['findWithShift', '12a'],
            ['findWithShift', true],
            ['findWithShift', new stdClass()],
        ];
    }

    public function numberProvider()
    {
        return [
            ['findWithMax', 11, 10],
            ['findWithMax', 14, 12],
            ['findWithMax', 21, 19],
            ['findWithMax', 22, 21],
            ['findWithMax', 50, 21],
            ['findWithMax', 3, -1],
            ['findWithMax', 2, -1],
            ['findWithMax', 0, -1],
            ['findWithMax', -1, -1],
            ['findWithMax', -50, -1],
            ['findWithMap', 11, 10],
            ['findWithMap', 14, 12],
            ['findWithMap', 21, 19],
            ['findWithMap', 22, 21],
            ['findWithMap', 50, 21],
            ['findWithMap', 3, -1],
            ['findWithMap', 2, -1],
            ['findWithMap', 0, -1],
            ['findWithMap', -1, -1],
            ['findWithMap', -50, -1],
            ['findWithReduce', 11, 10],
            ['findWithReduce', 14, 12],
            ['findWithReduce', 21, 19],
            ['findWithReduce', 22, 21],
            ['findWithReduce', 50, 21],
            ['findWithReduce', 3, -1],
            ['findWithReduce', 2, -1],
            ['findWithReduce', 0, -1],
            ['findWithReduce', -1, -1],
            ['findWithReduce', -50, -1],
            ['findWithWalk', 11, 10],
            ['findWithWalk', 14, 12],
            ['findWithWalk', 21, 19],
            ['findWithWalk', 22, 21],
            ['findWithWalk', 50, 21],
            ['findWithWalk', 3, -1],
            ['findWithWalk', 2, -1],
            ['findWithWalk', 0, -1],
            ['findWithWalk', -1, -1],
            ['findWithWalk', -50, -1],
            ['findWithCycle', 11, 10],
            ['findWithCycle', 14, 12],
            ['findWithCycle', 21, 19],
            ['findWithCycle', 22, 21],
            ['findWithCycle', 50, 21],
            ['findWithCycle', 3, -1],
            ['findWithCycle', 2, -1],
            ['findWithCycle', 0, -1],
            ['findWithCycle', -1, -1],
            ['findWithCycle', -50, -1],
            ['findWithShift', 11, 10],
            ['findWithShift', 14, 12],
            ['findWithShift', 21, 19],
            ['findWithShift', 22, 21],
            ['findWithShift', 50, 21],
            ['findWithShift', 3, -1],
            ['findWithShift', 2, -1],
            ['findWithShift', 0, -1],
            ['findWithShift', -1, -1],
            ['findWithShift', -50, -1],
        ];
    }
}
