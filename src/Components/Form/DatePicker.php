<?php

namespace Hostmoz\BladeBootstrapComponents\Components\Form;

use Hostmoz\BladeBootstrapComponents\Components\Component;
use Hostmoz\BladeBootstrapComponents\Components\HandlesDefaultAndOldValue;
use Hostmoz\BladeBootstrapComponents\Components\HandlesValidationErrors;

class DatePicker extends Component
{
    use HandlesValidationErrors;
    use HandlesDefaultAndOldValue;

    public string $label='';
    public string $name='';
    public ?string $value='';

    public function __construct(string $name='date_picker',string $label='',string $value='',$bind = null,
                                $default = null,
                                $language = null,
                                bool $showErrors = true, public $required = false)
    {
        $this->name= $name;
        $this->label=$label;
        $this->value=$value;

        $this->setValue($name, $bind, $default, $language);
    }
}
