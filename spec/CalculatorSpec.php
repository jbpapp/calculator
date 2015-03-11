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

    /** @test */
    function it_calculates_the_sum_of_a_given_string_of_operations()
    {
        $this->reset()->calculate('1+1+1')->getSum()->shouldBe(3);

        $this->reset()->calculate('4-3-1+7')->getSum()->shouldBe(7);
        
        $this->reset()->calculate('1 + 1 * 3 + 3')->getSum()->shouldBe(7);

        $this->reset()->calculate('6 * 6 * 3 - 4')->getSum()->shouldBe(104);

       $this->reset()->calculate('4 + 2 +1 *4 - 54')->getSum()->shouldBe(-44);

       $this->reset()->calculate('4 - 8 * 3 + 12 * 6')->getSum()->shouldBe(52);
    }

}