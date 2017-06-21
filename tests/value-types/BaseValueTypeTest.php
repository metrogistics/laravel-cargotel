<?php

use Cargotel\Exceptions\InvalidTypeException;
use Cargotel\ValueTypes\BaseValueType;
use Orchestra\Testbench\TestCase;
use Cargotel\CargotelServiceProvider;

class BaseValueTypeTest extends TestCase
{
    public function test_new_value_type_contains_null_value()
    {
        $value_type = new AnyValueType();

        $this->assertNull($value_type->get());
    }

    public function test_can_create_object_with_default_value_statically()
    {
        $this->assertEquals('default value', AnyValueType::default('default value')->get());
    }

    public function test_can_assign_default_value()
    {
        $value_type_1 = new AnyValueType('default value 1');
        $value_type_2 = (new AnyValueType())->setDefault('default value 2');

        $this->assertEquals('default value 1', $value_type_1->get());
        $this->assertEquals('default value 2', $value_type_2->get());
    }

    public function test_can_set_value()
    {
        $value_type = new AnyValueType();
        $value_type->set('set value');

        $this->assertEquals('set value', $value_type->get());
    }

    public function test_value_overrides_default()
    {
        $value_type = new AnyValueType('default value');

        $this->assertEquals('default value', $value_type->get());

        $value_type->set('set value');

        $this->assertEquals('set value', $value_type->get());
    }

    public function test_value_is_validated_before_being_set()
    {
        putenv('test=hello');
        $this->assertEquals('hello', getenv('test'));

        $value_type = new SpecialValueType();
        $value_type->set('1234');

        $this->assertEquals('goodbye', getenv('test'));
    }

    public function test_invalid_value_throws_exception()
    {
        $value_type = new SpecialValueType();

        $this->expectException(InvalidTypeException::class);

        $value_type->set('abcd');
    }

    public function test_default_value_is_subject_to_validation()
    {
        $this->expectException(InvalidTypeException::class);

        $value_type = new SpecialValueType('abcd');
    }

    public function test_value_gets_formatted()
    {
        $value_type = new SpecialValueType();
        $value_type->set('1234');

        $this->assertSame(1234, $value_type->get());
    }

    public function test_default_value_gets_formatted()
    {
        $value_type = new SpecialValueType('1234');

        $this->assertSame(1234, $value_type->get());
    }

    public function test_can_set_value_to_null()
    {
        $value_type = (new SpecialValueType('1234'))->set('2345');

        $this->assertSame(2345, $value_type->get());

        $value_type->set(null);

        $this->assertSame(1234, $value_type->get());
    }

    protected function getPackageProviders($app)
    {
        return [CargotelServiceProvider::class];
    }
}

class AnyValueType extends BaseValueType
{
    public function isValid($value)
    {
        return true;
    }

    public function format($value)
    {
        return $value;
    }
}

class SpecialValueType extends BaseValueType
{
    public function isValid($value)
    {
        putenv('test=goodbye');

        return preg_match('/\d/', $value);
    }

    public function format($value)
    {
        return $value * 1;
    }
}
