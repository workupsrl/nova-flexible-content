<?php

namespace Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Workup\Nova\FlexibleContent\Value\FlexibleCast;

class Page extends Model
{
    protected $fillable = [
        'title',
        'settings',
    ];

    protected $casts = [
        'settings' => FlexibleCast::class,
    ];

    public $timestamps = false;
}