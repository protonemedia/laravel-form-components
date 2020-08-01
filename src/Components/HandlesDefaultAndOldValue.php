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

        if (!$language) {
            $default = $this->getBoundValue($bind, $name) ?: $default;

            return $this->value = old($name, $default);
        }

        $bind = $this->getBoundTarget($bind, $name);

        if ($bind) {
            $default = $bind->getTranslation($name, $language, false) ?: $default;
        }

        $this->value = old("{$name}.{$language}", $default);
    }
}
