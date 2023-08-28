<?php

namespace Workup\NovaFlexibleContent\Layouts;

use Workup\NovaFlexibleContent\Flexible;

abstract class Preset
{
    /**
     * Execute the preset configuration
     *
     * @return void
     */
    abstract public function handle(Flexible $field);
}
