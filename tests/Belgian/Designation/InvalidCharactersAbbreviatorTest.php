<?php

declare(strict_types=1);

namespace DMT\Test\Address\Abbreviation\Belgian\Designation;

use DMT\Address\Abbreviation\Belgian\Designation\InvalidCharactersAbbreviator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class InvalidCharactersAbbreviatorTest extends TestCase
{
    #[DataProvider('addressProvider')]
    public function testAbbreviate(string $designation, string $expected): void
    {
        $this->assertEquals($expected, (new InvalidCharactersAbbreviator())->abbreviate($designation));
    }

    public static function addressProvider(): array
    {
        return [
            ['73 boîte 3', '73 boîte 3'],
            ['16, bus 32', '16 bus 32'],
            ['15 naast T&T', '15 naast TT'],
            ['13 (box A22)', '13 box A22'],
        ];
    }
}
