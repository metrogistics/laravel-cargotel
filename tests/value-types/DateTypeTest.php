<?php

use Carbon\Carbon;
use Orchestra\Testbench\TestCase;
use Cargotel\ValueTypes\DateType;
use Cargotel\Exceptions\InvalidTypeException;

class DateTypeTest extends TestCase
{
    public function test_new_value_type_contains_null_value()
    {
        $value_type = new DateType();

        $this->assertNull($value_type->get());
    }

    public function test_can_set_null_values()
    {
        $value_type = (new DateType())->set(null);

        $this->assertNull($value_type->get());

        $value_type = (new DateType())->set('');

        $this->assertNull($value_type->get());
    }

    public function test_can_parse_strings()
    {
        $value_type = new DateType('now');

        $this->assertEquals((string) Carbon::now(), (string) $value_type->get());
    }

    public function test_only_accepts_dateable_values()
    {
        $this->expectException(InvalidTypeException::class);

        $value_type = new DateType('blah');
    }

    public function test_accepts_strings()
    {
        $value_type_1 = new DateType('tomorrow');
        $value_type_2 = new DateType(new DateTime);
        $value_type_3 = new DateType(Carbon::now());

        $this->assertInstanceOf(Carbon::class, $value_type_1->get());
        $this->assertInstanceOf(Carbon::class, $value_type_2->get());
        $this->assertInstanceOf(Carbon::class, $value_type_3->get());
    }
}
