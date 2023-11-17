<?php

namespace Workup\Nova\FlexibleContent\Value;

use Workup\Nova\FlexibleContent\Concerns\HasFlexible;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class FlexibleCast implements CastsAttributes
{
    use HasFlexible;

    /**
     * @var array
     */
    protected $layouts = [];

    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * @return \Workup\Nova\FlexibleContent\Layouts\Collection|array<\Workup\Nova\FlexibleContent\Layouts\Layout>
     */
    public function get($model, string $key, $value, array $attributes)
    {
        $this->model = $model;

        return $this->cast($value, $this->getLayoutMapping());
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return collect($value)->map(fn ($item) => array_merge(
            $item,
            ['attributes' => collect($item['attributes'])->map(fn ($a) => is_array($a) ? json_encode($a) : $a)]
        ));
    }

    protected function getLayoutMapping()
    {
        return $this->layouts;
    }
}
