<?php

declare(strict_types=1);

namespace ReturnEarly\LaravelEnums;

use BadMethodCallException;
use Illuminate\Support\Collection;

trait EnumHelpers
{
    public static function collection(): Collection
    {
        return collect(self::cases());
    }

    public static function getValues(): Collection
    {
        return self::collection()->pluck('value');
    }

    public static function getNames(): Collection
    {
        return self::collection()->pluck('name');
    }

    public static function asSelectArray(): array
    {
        return self::collection()->pluck('name', 'value')->toArray();
    }

    public static function valuesBetween(self $from, self $to, bool $inclusive = true): Collection
    {
        return $inclusive
            ? self::valuesBetweenInclusive($from, $to)
            : self::valuesBetweenExclusionary($from, $to);
    }

    public static function valuesBetweenInclusive(self $from, self $to): Collection
    {
        return self::collection()
            ->filter(function (self $enum) use ($to, $from) {
                return $enum->value >= $from->value && $enum->value <= $to->value;
            });
    }

    public static function valuesBetweenExclusionary(self $from, self $to): Collection
    {
        return self::collection()
            ->filter(function (self $enum) use ($to, $from) {
                return $enum->value > $from->value && $enum->value < $to->value;
            });
    }

    public function isBetween(self $low, self $high): bool
    {
        return $this->value >= $low->value && $this->value <= $high->value;
    }

    public function is(self $input): bool
    {
        return $input->value === $this->value;
    }

    public function isAny(iterable $input): bool
    {
        foreach ($input as $item) {
            if ($this->is($item)) {
                return true;
            }
        }

        return false;
    }

    public static function contains(string $input): bool
    {
        return self::collection()->contains('value', $input);
    }

    public function isNot(self $input): bool
    {
        return ! $this->is($input);
    }

    public function isNotAny(iterable $input): bool
    {
        return ! $this->isAny($input);
    }

    public static function fromValue(int|string|self $value): static
    {
        if ($value instanceof self) {
            return $value;
        }

        return self::from($value);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function value(): int|string
    {
        return $this->value;
    }

    public static function __callStatic($method, $arguments)
    {
        if ($instance = self::collection()->firstWhere('name', $method)) {
            return $instance->value;
        }

        throw new BadMethodCallException("Method [{$method}] does not exist.");
    }
}
