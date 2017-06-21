<?php

use Cargotel\Exceptions\InvalidTypeException;
use Orchestra\Testbench\TestCase;
use Cargotel\ValueTypes\StringType;

class StringTypeTest extends TestCase
{
    public function test_new_value_type_contains_null_value()
    {
        $value_type = new StringType();

        $this->assertSame('', $value_type->get());
    }

    public function test_only_accepts_stringable_values()
    {
        $this->expectException(InvalidTypeException::class);

        $value_type = new StringType(new stdClass());
    }

    public function test_formats_values_to_strings()
    {
        $value_type = new StringType(1234);

        $this->assertSame('1234', $value_type->get());
    }
}
