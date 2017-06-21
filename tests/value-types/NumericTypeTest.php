<?php

use Cargotel\Exceptions\InvalidTypeException;
use Orchestra\Testbench\TestCase;
use Cargotel\ValueTypes\NumericType;

class NumericTypeTest extends TestCase
{
    public function test_new_value_type_contains_null_value()
    {
        $value_type = new NumericType();

        $this->assertSame(0, $value_type->get());
    }

    public function test_only_accepts_numeric_values()
    {
        $this->expectException(InvalidTypeException::class);

        $value_type = new NumericType(new stdClass());

        $this->expectException(InvalidTypeException::class);

        $value_type = new NumericType('abcd');
    }

    public function test_formats_values_to_numbers()
    {
        $value_type_1 = new NumericType('1234');
        $value_type_2 = new NumericType('2.34');

        $this->assertSame(1234, $value_type_1->get());
        $this->assertSame(2.34, $value_type_2->get());
    }

    public function test_falsey_values_return_as_zero()
    {
        $value_type_1 = new NumericType('');
        $value_type_2 = new NumericType(false);

        $this->assertSame(0, $value_type_1->get());
        $this->assertSame(0, $value_type_2->get());
    }
}
