<?php

namespace B2\Test\Contactenlijst;

use B2\Contactenlijst\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    /**
     * @tests
     * @dataProvider dates
     */
    function it_generates_dates_of_birth(string $date, int $year, int $month, int $day): void
    {
        $contact = new Contact();

        $contact->geboortejaar = $year;
        $contact->geboortemaand = $month;
        $contact->geboortedag = $day;

        self::assertEquals($date, $contact->geboortedatum());
    }

    public function dates(): array
    {
        return [
            ['2000-12-12', 2000, 12, 12],
            ['2001-1-1', 2001, 1, 1],
            ['2002-12-1', 2002, 12, 1],
            ['2003-1-12', 2003, 1, 12],
        ];
    }
}