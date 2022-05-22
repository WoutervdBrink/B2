<?php
/** @noinspection PhpUnitAssertCanBeReplacedWithEmptyInspection */

namespace B2\Test;

use B2\Contact;
use B2\Lijst;
use PHPUnit\Framework\TestCase;

class LijstTest extends TestCase
{
    protected Contact $contact1;
    protected Contact $contact2;
    protected Contact $contact3;

    public function contacts(): array
    {
        $contact1 = new Contact();
        $contact1->voornaam = 'Voor1';
        $contact1->achternaam = 'Achter1';

        $contact2 = new Contact();
        $contact2->voornaam = 'Voor2';
        $contact2->achternaam = 'Achter2';

        $contact3 = new Contact();
        $contact3->voornaam = 'Voor3';
        $contact3->achternaam = 'Achter3';
        
        return [
            [[$contact1], [$contact1]],
            [[$contact2], [$contact2]],
            [[$contact3], [$contact3]],
            [[$contact1, $contact2], [$contact1, $contact2]],
            [[$contact1, $contact2], [$contact2, $contact1]],
            [[$contact1, $contact3], [$contact1, $contact3]],
            [[$contact1, $contact3], [$contact3, $contact1]],
            [[$contact2, $contact3], [$contact2, $contact3]],
            [[$contact2, $contact3], [$contact3, $contact2]],
            [[$contact1, $contact2, $contact3], [$contact1, $contact2, $contact3]],
            [[$contact1, $contact2, $contact3], [$contact1, $contact3, $contact2]],
            [[$contact1, $contact2, $contact3], [$contact3, $contact1, $contact2]],
            [[$contact1, $contact2, $contact3], [$contact3, $contact2, $contact1]],
        ];
    }

    protected function setUp(): void
    {
        $this->contact1 = new Contact();
        $this->contact1->voornaam = 'Voor1';
        $this->contact1->achternaam = 'Achter1';

        $this->contact2 = new Contact();
        $this->contact2->voornaam = 'Voor2';
        $this->contact2->achternaam = 'Achter2';

        $this->contact3 = new Contact();
        $this->contact3->voornaam = 'Voor3';
        $this->contact3->achternaam = 'Achter3';
    }

    /**
     * @tests
     */
    function it_adds_to_an_empty_list()
    {
        $list = new Lijst();

        $list->voegToe($this->contact1);

        $this->assertEquals(1, $list->grootte);
        $this->assertEquals($this->contact1, $list->eerste->contact);
        $this->assertTrue(empty($list->eerste->volgende));
    }

    /** @tests */
    function it_adds_two_contacts_in_order(): void
    {
        $list = new Lijst();

        $list->voegToe($this->contact1);
        $list->voegToe($this->contact2);

        $this->assertEquals(2, $list->grootte);
        $this->assertEquals($this->contact1, $list->eerste->contact);
        $this->assertNotEmpty($list->eerste->volgende);

        $element1 = $list->eerste;
        $element2 = $element1->volgende;

        $this->assertEquals($this->contact2, $element2->contact);
        $this->assertTrue(empty($element2->volgende));
    }

    /** @tests */
    function it_adds_two_contacts_out_of_order(): void
    {
        $list = new Lijst();

        $list->voegToe($this->contact2);
        $list->voegToe($this->contact1);

        $this->assertEquals(2, $list->grootte);
        $this->assertEquals($this->contact1, $list->eerste->contact);
        $this->assertNotEmpty($list->eerste->volgende);

        $element1 = $list->eerste;
        $element2 = $element1->volgende;

        $this->assertEquals($this->contact2, $element2->contact);
        $this->assertTrue(empty($element2->volgende));
    }

    /** @tests */
    function it_returns_contacts_as_array(): void
    {
        $list = new Lijst();

        $list->voegToe($this->contact1);
        $list->voegToe($this->contact2);

        $this->assertEquals([$this->contact1, $this->contact2], $list->contacten());
    }

    /**
     * @tests
     * @dataProvider contacts
     */
    function it_adds_contacts(array $ordered, array $contacts): void
    {
        $list = new Lijst();

        foreach ($contacts as $contact) {
            $list->voegToe($contact);
        }
        echo PHP_EOL;

        $this->assertEquals($ordered, $list->contacten());
    }
}