<?php

namespace Hostmoz\BladeBootstrapComponents\Components\Form;

use Hostmoz\BladeBootstrapComponents\Components\Component;

class Errors extends Component
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = str_replace(['[', ']'], ['.', ''], $name);
    }
}
