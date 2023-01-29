<?php

namespace ReturnEarly\LaravelEnums\Commands;

use Illuminate\Console\Command;

class LaravelEnumsCommand extends Command
{
    public $signature = 'laravel-enums';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
