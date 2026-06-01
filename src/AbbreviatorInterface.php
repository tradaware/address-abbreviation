<?php

declare(strict_types=1);

namespace DMT\Address\Abbreviation;

interface AbbreviatorInterface
{
    /**
     * Abbreviate an address part.
     */
    public function abbreviate(string $phrase): string;
}
