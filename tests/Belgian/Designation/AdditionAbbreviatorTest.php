<?php

declare(strict_types=1);

namespace DMT\Test\Address\Abbreviation\Belgian\Designation;

use DMT\Address\Abbreviation\Belgian\Designation\AdditionAbbreviator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class AdditionAbbreviatorTest extends TestCase
{
    #[DataProvider('addressProvider')]
    public function testAbbreviate(string $designation, string $expected): void
    {
        $this->assertEquals($expected, (new AdditionAbbreviator())->abbreviate($designation));
    }

    public static function addressProvider(): array
    {
        return [
            ['49-51', '49-51'],
            ['16/2', '16/2'],
            ['37 - 41', '37-41'],
            ['13b', '13B'],
            ['10 A bus 0101', '10A bus 0101'],
            ['55 bis 2', '55 bis2'],
        ];
    }
}
