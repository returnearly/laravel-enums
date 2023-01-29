<?php

namespace ReturnEarly\LaravelEnums\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use ReturnEarly\LaravelEnums\LaravelEnumsServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelEnumsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
    }
}
