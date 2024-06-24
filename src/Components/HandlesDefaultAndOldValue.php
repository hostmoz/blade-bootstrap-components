<?php

namespace Hostmoz\BladeBootstrapComponents\Components;

trait HandlesDefaultAndOldValue
{
    use HandlesBoundValues;

    private function setValue(
        string $name,
        $bind = null,
        $default = null,
        $language = null
    ) {
        if ($this->isWired()) {
            return;
        }

        $named = $this->convertBracketsToDotNotation($name);

        if (!$language) {
            $default = $this->getBoundValue($bind, $named) ?: $default;

            return $this->value = old($named, $default);
        }

        if ($bind !== false) {
            $bind = $bind ?: $this->getBoundTarget();
        }

        if ($bind) {
            $default = $bind->getTranslation($named, $language, false) ?: $default;
        }

        $this->value = old("{$named}.{$language}", $default);
    }

    private function convertBracketsToDotNotation($string)
    {
        // Regular expression to match brackets and convert them to dots
        return preg_replace('/\[(.*?)\]/', '.$1', $string);
    }
}
