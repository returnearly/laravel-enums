<?php

namespace ReturnEarly\LaravelEnums;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use ReturnEarly\LaravelEnums\Commands\LaravelEnumsCommand;

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
