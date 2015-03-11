<?php namespace Smartbit;

class Calculator
{
	protected $sum = 0;

    /** 
     * Get the sum of the operations.
     * 
     * @return int
     */
	public function getSum()
	{
		return $this->sum;
	}

    /**
     * It takes the first argument as a starting value.
     * 
     * @param  int $num
     * @return Smartbit\Calculator
     */
    public function take($num)
    {
        $this->sum += $num;

        return $this;
    }    

    /**
     * It multiplies the current value.
     * 
     * @param  int $num
     * @return Smartbit\Calculator
     */
    public function multiply($num)
    {
        $this->sum *= $num;

        return $this;
    }

    /**
     * It divides the current value.
     * 
     * @param  int $num
     * @return Smartbit\Calculator
     */
    public function divide($num)
    {
        $this->sum /= $num;

        return $this;
    }

    /**
     * It's a mask for the take method.
     * 
     * @param int $num
     */
    public function add($num)
    {
        $this->take($num);
    }

    /**
     * It substract the given number from the current value.
     * 
     * @param  int $num
     * @return Smartbit\Calculator
     */
    public function substract($num)
    {
        $this->sum -= $num;

        return $this;
    }    
}
