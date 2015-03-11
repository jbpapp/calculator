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

    /** @test */
    function it_takes_a_number_as_a_starting_value()
    {
        $this->take(5);

        $this->getSum()->shouldBe(5);
    }    

    /** @test */
    function it_calculates_the_multiplication()
    {
        $this->take(5)->multiply(6);

        $this->getSum()->shouldBe(30);
    }

    /** @test */
    function it_calculates_the_division()
    {
        $this->take(20)->divide(5);

        $this->getSum()->shouldBe(4);
    }

    /** @test */
    function it_calculates_the_addition()
    {
        $this->take(5)->add(6);

        $this->getSum()->shouldBe(11);
    }

    /** @test */
    function it_calculates_the_substraction()
    {
        $this->take(39)->substract(17);

        $this->getSum()->shouldBe(22);
    }    

}