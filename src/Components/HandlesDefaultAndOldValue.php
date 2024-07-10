<?php

namespace Hostmoz\BladeBootstrapComponents\Components;

trait HandlesDefaultAndOldValue
{
    use HandlesBoundValues;

    private function setValue(
        string $name,
        $bind = null,
        $default = null,
    ) {
        if ($this->isWired()) {
            return;
        }

        $named = $this->convertBracketsToDotNotation($name);
        $default = $this->getBoundValue($bind, $named) ?: $default;
        return $this->value = old($named, $default);

    }

    private function convertBracketsToDotNotation($string)
    {
        // Regular expression to match brackets and convert them to dots
        return preg_replace('/\[(.*?)\]/', '.$1', $string);
    }
}
