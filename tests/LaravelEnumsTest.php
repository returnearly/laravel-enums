<?php

declare(strict_types=1);

use ReturnEarly\LaravelEnums\Tests\IntEnum;
use ReturnEarly\LaravelEnums\Tests\StringEnum;

test('int enums can be called statically for a value', function () {
    $this->assertEquals(1, IntEnum::ONE());
});

test('string enums can be called statically for a value', function () {
    $this->assertEquals('A', StringEnum::A());
});

test('an enum can be checked with is', function () {
    $this->assertTrue(IntEnum::ONE->is(IntEnum::ONE));
    $this->assertFalse(IntEnum::ONE->is(IntEnum::TWO));
});

test('an enum can be checked with is not', function () {
    $this->assertTrue(IntEnum::ONE->isNot(IntEnum::TWO));
    $this->assertFalse(IntEnum::ONE->isNot(IntEnum::ONE));
});

test('an int enum can check if its value is between others', function () {
    $this->assertTrue(IntEnum::TWO->isBetween(IntEnum::ONE, IntEnum::THREE));
    $this->assertFalse(IntEnum::ONE->isBetween(IntEnum::TWO, IntEnum::THREE));
});

test('an int enum can check if the collection contains its value', function () {
    $this->assertTrue(IntEnum::contains('2'));
});

test('an enum can manifest as a collection', function () {
    $this->assertEquals(
        [
            IntEnum::ONE,
            IntEnum::TWO,
            IntEnum::THREE,
        ],
        IntEnum::collection()->toArray()
    );
});

test('an enum can get its values as a collection', function () {
    $this->assertEquals(
        [
            1,
            2,
            3,
        ],
        IntEnum::getValues()->toArray()
    );
});

test('an enum can get its names as a collection', function () {
    $this->assertEquals(
        [
            'ONE',
            'TWO',
            'THREE',
        ],
        IntEnum::getNames()->toArray()
    );
});

test('an enum can get its values as a select array', function () {
    $this->assertEquals(
        [
            1 => 'ONE',
            2 => 'TWO',
            3 => 'THREE',
        ],
        IntEnum::asSelectArray()
    );
});

test('an enum can get its values between two others excluding those others', function () {
    expect(IntEnum::valuesBetween(IntEnum::ONE, IntEnum::THREE, false)->toArray())
        ->toHaveCount(1);
});

test('an enum can get its values between two others including those others', function () {
    expect(IntEnum::valuesBetween(IntEnum::ONE, IntEnum::THREE, true)->toArray())
        ->toHaveCount(3);
});

test('an enum can check if it is any of a list of enums', function () {
    $this->assertTrue(IntEnum::ONE->isAny([IntEnum::ONE, IntEnum::TWO]));
    $this->assertFalse(IntEnum::ONE->isAny([IntEnum::TWO, IntEnum::THREE]));
});

test('an enum can be created from a value', function () {
    $this->assertEquals(IntEnum::ONE, IntEnum::fromValue(1));
});

test('an enum can be created from another enum', function () {
    $this->assertEquals(IntEnum::ONE, IntEnum::fromValue(IntEnum::ONE));
});

test('an enum can get its name', function () {
    $this->assertEquals('ONE', IntEnum::ONE->name());
});

test('an enum can get its value', function () {
    $this->assertEquals(1, IntEnum::ONE->value());
});

test('a missing method throws a bad method call exception', function () {
    $this->expectException(BadMethodCallException::class);
    IntEnum::FOUR();
});
