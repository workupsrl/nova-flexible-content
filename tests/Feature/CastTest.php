<?php

it('correctly cast payload with translated fields', function () {
    $data = [
        [
            "key" => "crZ55Rzyf8IDk8Pk",
            "layout" => "cta",
            "attributes" => [
                "cta_link" => [
                    "it" => "link",
                ],
                "cta_label" => [
                    "it" => "label",
                ],
                "cta_target" => null,
                "cta_text_position" => "top",
            ],
        ],
    ];

    $page = \Tests\Models\Page::create([
        'title' => 'test',
        'settings' => $data,
    ]);

    expect($page->settings)->toBeInstanceOf(Workup\Nova\FlexibleContent\Layouts\Collection::class)
        ->and($page->settings->first())->toBeInstanceOf(Workup\Nova\FlexibleContent\Layouts\Layout::class);

    $attributes = $page->settings->first()->getAttributes();
    if (is_array($attributes)) {
        $attributes = collect($attributes)->first();
    }

    expect($attributes)->toHaveCount(4)
        ->and($attributes['cta_link'])->toBe('{"it":"link"}')
        ->and($attributes['cta_label'])->toBe('{"it":"label"}')
        ->and($attributes['cta_target'])->toBeNull()
        ->and($attributes['cta_text_position'])->toBe('top');
});

it('correctly set a promotion rule content', function () {
    $data = [
        [
            "layout" => "items_total",
            "key" => "cgYDFsrJ9bwzEkNG",
            "attributes" => [
                "amount" => 5000,
            ],
        ],
    ];

    $page = \Tests\Models\Page::create([
        'title' => 'test',
        'settings' => $data,
    ]);

    expect($page->settings)->toBeInstanceOf(Workup\Nova\FlexibleContent\Layouts\Collection::class)
        ->and($page->settings->first())->toBeInstanceOf(Workup\Nova\FlexibleContent\Layouts\Layout::class);

    $attributes = $page->settings->first()->getAttributes();
    if (is_array($attributes)) {
        $attributes = collect($attributes)->first();
    }

    expect($attributes)->toHaveCount(1)
        ->and($attributes['amount'])->toBe(5000);
});
