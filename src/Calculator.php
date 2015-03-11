<?php namespace Smartbit;

class Calculator
{
    protected $sum = 0;
    protected $calculations = 0;
    protected $operations = [
        '*' => 'multiply',
        '/' => 'divide',
        '+' => 'add',
        '-' => 'substract'
    ];
    protected $precedences = [
        '*', '/'
    ];

    public function reset()
    {
        $this->sum = 0;
        $this->calculations = 0;

        return $this;
    }

    public function getSum()
    {
        return $this->sum;
    }

    public function take($num)
    {
        $this->sum += $num;

        return $this;
    }

    public function multiply($num)
    {
        $this->sum *= $num;

        return $this;
    }

    public function divide($num)
    {
        $this->sum /= $num;

        return $this;
    }

    public function add($num)
    {
        $this->take($num);
    }

    public function substract($num)
    {
        $this->sum -= $num;

        return $this;
    }

    public function calculate($str)
    {
        preg_match_all('/(\b[\d]+\b)|[(\)\+\-\*\/\.]/', $str, $matches);

        $items = $matches[0];

        // We have to calculate multiply and divide operations first
        if ($precedences = $this->detectPrecedences($matches[0]))
        {
            foreach($precedences as $key => $value)
                $items = $this->runCalculation($key, $items, $value);
        }        

        foreach ($items as $key => $value)
        {
            if (in_array($value, array_keys($this->operations)) and ! in_array($value, $precedences))
            {
                $this->runCalculation($key, $items, $value);
            }
        
        }

        return $this;
    }

    private function runCalculation($key, $items, $operation)
    {
        $prev = $this->getElement($items, $key, 'prev');
        $next = $this->getElement($items, $key, 'next');

        $operation = $this->operations[$operation];
        if (isset($items[$key]) and in_array($items[$key], ['*', '/']))
        {        
            $this->take($prev['value'])->{$operation}($next['value']);
            $items[$key] = $this->sum;
            unset($items[$prev['key']]);
            unset($items[$next['key']]);
            $this->reset();

            return $items;
        }
        elseif ($this->calculations)
            $this->{$operation}($next['value']);
        else
            $this->take($prev['value'])->{$operation}($next['value']);

        $this->calculations++;
    }

    private function getElement($items, $key, $dir)
    {
        $itemKeys = array_keys($items);
        reset($itemKeys);
        while(current($itemKeys) !== $key) next($itemKeys);

        $key = $dir == 'prev' ? prev($itemKeys) : next($itemKeys);
        $value = $items[$key];
        return ['key' => $key, 'value' => $value];
    }

    private function detectPrecedences($items)
    {
        $operations = [];
        foreach ($items as $key => $value)
        {
            if (in_array($value, $this->precedences))
            {
                $operations[$key] = $value;
            }
        }

        return $operations;
    }
}
