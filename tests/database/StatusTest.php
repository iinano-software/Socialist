<?php

/*
 * Socialist
 */

namespace tests\database;

use Trismegiste\Socialist\Status;
use Trismegiste\Socialist\Author;
use Trismegiste\Socialist\Publishing;

/**
 * StatusTest tests Status persistence with all embeded entities
 */
class StatusTest extends PublishingTestCase
{

    protected function createRootEntity(Author $author)
    {
        $sut = new Status($author);
        $sut->setMessage("Hello there !");
        $sut->setLatitude(43.00001);
        $sut->setLongitude(7.00001);

        return $sut;
    }

    protected function assertRootEquals(Publishing $doc)
    {
        $this->assertEquals("Hello there !", $doc->getMessage());
        $this->assertEquals(43.00001, $doc->getLatitude());
        $this->assertEquals(7.00001, $doc->getLongitude());
    }

}
