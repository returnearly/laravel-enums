<?php

declare(strict_types=1);

namespace ReturnEarly\LaravelEnums\Tests;

use ReturnEarly\LaravelEnums\EnumHelpers;

enum StringEnum: string
{
    use EnumHelpers;

    case A = 'A';
    case B = 'B';
    case C = 'C';
}
