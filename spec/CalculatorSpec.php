<?php

namespace spec\Smartbit;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Smartbit\Calculator');
    }

    /** @test */
    function it_returns_the_sum_of_the_operations()
    {
    	$this->getSum()->shouldBe(0);
    }

}