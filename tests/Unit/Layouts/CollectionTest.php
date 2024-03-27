<?php

namespace Tests\Unit\Layouts;

use Workup\Nova\FlexibleContent\Layouts\Layout;
use Workup\Nova\FlexibleContent\Layouts\Collection;

test('find', function () {
    $collection = new Collection([new Layout('Foo', 'bar')]);

    expect($collection->find('bar'))->not->toBeNull()
        ->and($collection->find('a-name'))->toBeNull();
});
