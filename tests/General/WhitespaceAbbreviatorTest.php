<?php

namespace DMT\Test\Address\Abbreviation\General;

use DMT\Address\Abbreviation\General\WhitespaceAbbreviator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class WhitespaceAbbreviatorTest extends TestCase
{
    #[DataProvider('addressProvider')]
    public function testAbbreviate(string $streetOrDesignation, string $expected): void
    {
        $this->assertEquals($expected, (new WhitespaceAbbreviator())->abbreviate($streetOrDesignation));
    }

    public static function addressProvider(): iterable
    {
        return [
            ['bakkerstraat', 'bakkerstraat'],
            [' rue de la place', 'rue de la place'],
            ['rijkstraatweg ', 'rijkstraatweg'],
            ['kleine  kerkstraat', 'kleine kerkstraat'],
            ['Wiboutrouwstraat  ', 'Wiboutrouwstraat'],
            ['10  A', '10 A'],
        ];
    }
}
