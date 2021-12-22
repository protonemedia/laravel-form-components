<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

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

        $inputName = static::convertBracketsToDots($name);

        if (!$language) {
            $boundValue = $this->getBoundValue($bind, $inputName);

            $default = is_null($boundValue) ? $default : $boundValue;

            return $this->value = old($inputName, $default);
        }

        if ($bind !== false) {
            $bind = $bind ?: $this->getBoundTarget();
        }

        if ($bind) {
            $default = $bind->getTranslation($name, $language, false) ?: $default;
        }

        $this->value = old("{$inputName}.{$language}", $default);
    }
}
