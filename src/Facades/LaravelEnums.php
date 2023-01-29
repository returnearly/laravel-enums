<?php

namespace ReturnEarly\LaravelEnums\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ReturnEarly\LaravelEnums\LaravelEnums
 */
class LaravelEnums extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \ReturnEarly\LaravelEnums\LaravelEnums::class;
    }
}
