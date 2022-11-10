<?php

namespace Workup\NovaFlexibleContent\Layouts;


use Workup\Core\Traits\HasSerializationModifiers;
use Workup\Core\Traits\HasTranslations;
use Workup\NovaTranslatableField\NovaTranslatableField;

class TranslatableLayout extends Layout
{
    use HasTranslations, HasSerializationModifiers;

    public function getTranslatableAttributes(): array
    {
        return $this->fields->filter(fn ($f) => $f instanceof NovaTranslatableField)->pluck('attribute')->all();
    }

    public function resolveForDisplay(array $attributes = []): array
    {
        $this->fields->each(function ($field) {
            $field->resolveForDisplay($this);
        });

        return $this->getResolvedValue();
    }
}
