<?php

namespace Backstageel\BladeBootstrapComponents\Components\Form;

use Backstageel\BladeBootstrapComponents\Components\Component;

class DateTimePicker extends Component
{
    public string $label='';
    public string $name='';
    public string $value='';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name='kkk',string $label='',string $value='')
    {
        $this->name= $name;
        $this->label=$label;
        $this->value=$value;
    }
}
