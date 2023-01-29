<?php

namespace ReturnEarly\LaravelEnums\Commands;

use Illuminate\Console\Command;

class MakeEnumCommand extends Command
{
    public $signature = 'make:enum {name}';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
