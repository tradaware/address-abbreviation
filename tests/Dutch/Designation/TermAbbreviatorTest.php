<?php

declare(strict_types=1);

namespace DMT\Test\Address\Abbreviation\Dutch\Designation;

use DMT\Address\Abbreviation\Dutch\Designation\TermAbbreviator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class TermAbbreviatorTest extends TestCase
{
    #[DataProvider('addressProvider')]
    public function testAbbreviate(string $designation, string $expected): void
    {
        $this->assertSame($expected, (new TermAbbreviator())->abbreviate($designation));
    }

    public static function addressProvider(): array
    {
        return [
            ['123 begane grond', '123 BG'],
            ['456 bg', '456 BG'],
            ['789 sous', '789 O'],
            ['321 souterrain', '321 O'],
            ['654 huis', '654 H'],
            ['987 hs', '987 H'],
            ['258 2 hoog', '258 2 hoog'],
        ];
    }
}
