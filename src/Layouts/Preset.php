<?php

namespace Workup\Nova\FlexibleContent\Layouts;

use Workup\Nova\FlexibleContent\Flexible;

abstract class Preset
{
    /**
     * Execute the preset configuration
     *
     * @return void
     */
    abstract public function handle(Flexible $field);
}
