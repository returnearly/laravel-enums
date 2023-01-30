<?php

namespace ReturnEarly\LaravelEnums\Commands;

use Illuminate\Console\Concerns\CreatesMatchingTest;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class MakeEnumCommand extends GeneratorCommand
{
    use CreatesMatchingTest;

    protected $signature = 'make:enum {name} {--int} {--string}';

    protected $description = 'Generates an integer or string based enum.';

    protected $type = 'Enum';

    protected function getStub(): string
    {
        return $this->resolveStubPath("/stubs/enum-{$this->getEnumType()}.stub");
    }

    protected function resolveStubPath($stub): string
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__.$stub;
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Enums';
    }

    protected function qualifyClass($name): string
    {
        if (! Str::endsWith($name, 'Enum')) {
            $name = $name.'Enum';
        }

        return parent::qualifyClass($name);
    }

    protected function getEnumType(): string
    {
        if ($this->option('int')) {
            return 'int';
        }

        if ($this->option('string')) {
            return 'string';
        }

        return $this->choice(
            'What type of enum do you want to create?',
            [
                'int',
                'string',
            ]
        );
    }

    protected function getOptions(): array
    {
        return [
            ['int', null, InputOption::VALUE_NONE, 'Create a integer based enum.'],
            ['string', null, InputOption::VALUE_NONE, 'Create a string based enum.'],
        ];
    }
}
