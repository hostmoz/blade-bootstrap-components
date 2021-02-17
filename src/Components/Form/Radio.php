<?php

namespace Hostmoz\BladeBootstrapComponents\Components\Form;


class Radio extends Checkbox
{
    public function __construct(
        string $name,
        string $label = '',
        $value = 1,
        $bind = null,
        bool $default = false,
        bool $showErrors = false
    ) {
        parent::__construct($name, $label, $value, $bind, $default, $showErrors);
    }
}
