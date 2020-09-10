<?php

namespace Hostmoz\BladeBootstrapComponents\Components;

class FormDualListbox extends Component
{
    use HandlesValidationErrors;
    use HandlesBoundValues;

    public $options;
    public string $label;
    public string $name;
    public $selectedKey;

    public function __construct($options=[],string $name,string $label='')
    {
        $this->options = $options;
        $this->name=$name;
        $this->label=$label;

    }

    public function isSelected($key): bool
    {
        if ($this->isWired()) {
            return false;
        }

        if ($this->selectedKey === $key) {
            return true;
        }

        if (is_array($this->selectedKey) && in_array($key, $this->selectedKey)) {
            return true;
        }

        return false;
    }


}
