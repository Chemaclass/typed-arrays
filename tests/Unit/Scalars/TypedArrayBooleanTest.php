<?php

declare(strict_types=1);

namespace TypedArraysTest\Unit\Scalars;

use Generator;
use PHPUnit\Framework\TestCase;
use stdClass;
use TypedArrays\AbstractTypedArray;
use TypedArrays\Exceptions\InvalidTypeException;
use TypedArrays\Scalars\TypedArrayBoolean;

final class TypedArrayBooleanTest extends TestCase
{
    public function testConstruct(): void
    {
        $test = new TypedArrayBoolean([true]);

        self::assertInstanceOf(TypedArrayBoolean::class, $test);
        self::assertInstanceOf(AbstractTypedArray::class, $test);
    }

    /**
     * @dataProvider providerInvalidScalarInputTypeOnInstantiate
     */
    public function testInvalidScalarInputTypeOnInstantiate(array $arguments): void
    {
        $this->expectException(InvalidTypeException::class);

        new TypedArrayBoolean($arguments);
    }

    /**
     * @dataProvider providerInvalidScalarInputTypeOnAdd
     *
     * @param mixed $argument
     */
    public function testInvalidScalarInputTypeOnAdd($argument): void
    {
        $this->expectException(InvalidTypeException::class);

        $test = new TypedArrayBoolean([]);
        $test[] = $argument;
    }

    public function providerInvalidScalarInputTypeOnInstantiate(): Generator
    {
        yield 'Receiving integers' => [
            'arguments' => [1, 2],
        ];

        yield 'Receiving floats' => [
            'arguments' => [1.23, 4.56],
        ];

        yield 'Receiving stdClasses' => [
            'arguments' => [new stdClass(), new stdClass()],
        ];

        yield 'Receiving strings' => [
            'arguments' => ['str1', 'str2'],
        ];

        yield 'Receiving a mix of all scalars' => [
            'arguments' => [true, 1, 2.3, 'string', new stdClass()],
        ];
    }

    public function providerInvalidScalarInputTypeOnAdd(): Generator
    {
        yield 'Adding integer' => [
            'argument' => 1,
        ];

        yield 'Adding float' => [
            'argument' => 1.23,
        ];

        yield 'Adding stdClass' => [
            'argument' => new stdClass(),
        ];

        yield 'Adding string' => [
            'argument' => 'str1',
        ];
    }
}