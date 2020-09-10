<?php

namespace Backstageel\BladeBootstrapComponents\Components;


class FormDateInterval extends Component
{
    public string $nameStart;
    public string $nameEnd;
    public string $labelStart;
    public string $labelEnd;
    public ?string $valueStart='';
    public ?string $valueEnd='';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $nameStart,string $nameEnd,string $labelStart,string $labelEnd,?string $valueStart='',?string $valueEnd='')
    {
        $this->nameStart = $nameStart;
        $this->nameEnd  = $nameEnd;
        $this->labelStart = $labelStart;
        $this->labelEnd = $labelEnd;
        $this->valueStart = $valueStart;
        $this->valueEnd = $valueEnd;
    }
}
