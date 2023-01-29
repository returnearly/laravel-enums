<?php

namespace ReturnEarly\LaravelEnums;

use ReturnEarly\LaravelEnums\Commands\MakeEnumCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelEnumsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-enums')
            ->hasCommand(MakeEnumCommand::class);
    }
}
