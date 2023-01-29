<?php

namespace ReturnEarly\LaravelEnums;

use ReturnEarly\LaravelEnums\Commands\LaravelEnumsCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelEnumsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-enums')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-enums_table')
            ->hasCommand(LaravelEnumsCommand::class);
    }
}
