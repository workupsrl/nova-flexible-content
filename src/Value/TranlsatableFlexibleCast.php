<?php

namespace Workup\NovaFlexibleContent\Value;

use Workup\NovaFlexibleContent\Layouts\TranslatableLayout;

class TranlsatableFlexibleCast extends FlexibleCast
{
    /**
     * {@inheritDoc}
     */
    protected function createMappedLayout($name, $key, $attributes, array $layoutMapping)
    {
        $classname = array_key_exists($name, $layoutMapping)
            ? $layoutMapping[$name]
            : TranslatableLayout::class;

        $layout = new $classname($name, $name, [], $key, $attributes);

        $layout->setModel($this->model);

        return $layout;
    }
}
