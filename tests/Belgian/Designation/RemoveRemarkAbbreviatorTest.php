<?php

declare(strict_types=1);

namespace DMT\Test\Address\Abbreviation\Belgian\Designation;

use DMT\Address\Abbreviation\Belgian\Designation\RemoveRemarkAbbreviator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class RemoveRemarkAbbreviatorTest extends TestCase
{
    #[DataProvider('addressProvider')]
    public function testAbbreviate(string $designation, string $expected): void
    {
        $this->assertEquals($expected, (new RemoveRemarkAbbreviator())->abbreviate($designation));
    }

    public static function addressProvider(): iterable
    {
        return [
            ['10 na 5 uur', '10'],
            ['2A 2e verdieping', '2A'],
            ['19-21 box 21 after 3', '19-21 box 21'],
            ['5A bis tussen 3 en 4', '5A bis'],
            ['16/2 bij niet thuis bij nr 16/1', '16/2'],
            ['5/1', '5/1'],
            ['8-10', '8-10'],
        ];
    }
}
