<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use ProtoneMedia\LaravelFormComponents\FormDataBinder;

trait HandlesBoundValues
{
    protected $eloquentRelation = false;

    /**
     * Get an instance of FormDataBinder.
     *
     * @return FormDataBinder
     */
    private function getFormDataBinder(): FormDataBinder
    {
        return app(FormDataBinder::class);
    }

    /**
     * Get the latest bound target.
     *
     * @return mixed
     */
    private function getBoundTarget()
    {
        return $this->getFormDataBinder()->get();
    }

    /**
     * Get an item from the latest bound target.
     *
     * @param mixed $bind
     * @param string $name
     * @return mixed
     */
    private function getBoundValue($bind, string $name)
    {
        if ($bind === false) {
            return null;
        }

        $bind = $bind ?: $this->getBoundTarget();

        if ($this->eloquentRelation) {
            return $this->findOptionsFromRelation($bind, $name);
        }

        return data_get($bind, $name);
    }

    private function findOptionsFromRelation($bind, string $name)
    {
        if (!$bind instanceof Model) {
            return;
        }

        $relation = $bind->{$name}();

        if ($relation instanceof BelongsToMany) {
            $related = $relation->getRelated();

            $relatedKeyName = $relation->getRelatedKeyName();

            return $relation->getBaseQuery()
                ->get($related->qualifyColumn($relatedKeyName))
                ->pluck($relatedKeyName)
                ->all();
        }
    }
}
