<?php

declare(strict_types=1);

namespace ReturnEarly\LaravelEnums\Tests;

use ReturnEarly\LaravelEnums\EnumHelpers;

enum IntEnum: int
{
    use EnumHelpers;

    case ONE = 1;
    case TWO = 2;
    case THREE = 3;
}
