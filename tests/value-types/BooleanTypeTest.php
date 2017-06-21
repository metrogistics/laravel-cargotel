<?php

use Cargotel\Exceptions\InvalidTypeException;
use Orchestra\Testbench\TestCase;
use Cargotel\ValueTypes\BooleanType;

class BooleanTypeTest extends TestCase
{
    public function test_new_value_type_contains_false_value()
    {
        $value_type = new BooleanType();

        $this->assertFalse($value_type->get());
    }

    public function test_boolean_values()
    {
        $value_type_true = new BooleanType(true);
        $value_type_false = new BooleanType(false);

        $this->assertTrue($value_type_true->get());
        $this->assertFalse($value_type_false->get());

        $value_type_true = new BooleanType('true');
        $value_type_false = new BooleanType('false');

        $this->assertTrue($value_type_true->get());
        $this->assertFalse($value_type_false->get());

        $value_type_true = new BooleanType(1);
        $value_type_false = new BooleanType(0);

        $this->assertTrue($value_type_true->get());
        $this->assertFalse($value_type_false->get());
    }
}
