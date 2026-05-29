<?php

namespace DMT\Test\Address\Abbreviation\Belgian\Designation;

use DMT\Address\Abbreviation\Belgian\Designation\BoxAbbreviator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class BoxAbbreviatorTest extends TestCase
{
    #[DataProvider('addressProvider')]
    public function testAbbreviate(string $designation, string $expected): void
    {
        $this->assertEquals($expected, (new BoxAbbreviator())->abbreviate($designation));
    }


    public static function addressProvider(): array
    {
        return [
            ['49A bus22', '49A bus 22'],
            ['762 boîte 10', '762 bte 10'],
            ['37 bte 5', '37 bte 5'],
            ['123 bus 0101', '123 bus 0101'],
            ['76 box 3', '76 box 3'],
            ['2A BoÎTe B12', '2A bte B12'],
            ['123 Box 0101 tussen 2 en 4', '123 box 0101 tussen 2 en 4'],
            // ignored, not box in designation
            ['48 b12', '48 b12'],
            ['1 bis2', '1 bis2'],
        ];
    }
}
