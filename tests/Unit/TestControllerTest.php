<?php

namespace Tests\Unit;

use App\Http\Controllers\TestController;
use PHPUnit\Framework\TestCase;

class TestControllerTest extends TestCase
{

    public function testGetPseudoRandomNumbersOne()
    {
        $numberArray = [0, 4, 3, 2, 1];
        $numbers = (new TestController())->GetPseudoRandomNumbers(5, 5);
        $this->assertEquals($numberArray, $numbers);
    }
    public function testGetPseudoRandomNumbersTwo()
    {
        $numberArray = [0, 3, 2, 1, 0];
        $numbers = (new TestController())->GetPseudoRandomNumbers(4, 5);
        $this->assertEquals($numberArray, $numbers);
    }
    public function testGetPseudoRandomNumbersThree()
    {
        $numberArray = [0, 5, 4, 3];
        $numbers = (new TestController())->GetPseudoRandomNumbers(6, 4);
        $this->assertEquals($numberArray, $numbers);
    }
}
