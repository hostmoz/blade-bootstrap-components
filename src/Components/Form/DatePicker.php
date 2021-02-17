<?php

namespace Hostmoz\BladeBootstrapComponents\Components\Form;

use Hostmoz\BladeBootstrapComponents\Components\Component;

class DatePicker extends Component
{
    public string $label='';
    public string $name='';
    public string $value='';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name='date_picker',string $label='',string $value='')
    {
        $this->name= $name;
        $this->label=$label;
        $this->value=$value;
    }
}
