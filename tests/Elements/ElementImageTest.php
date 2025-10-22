<?php

namespace Dynamic\Elements\Image\Tests;

use Dynamic\Elements\Image\Elements\ElementImage;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

/**
 * Class ElementImageTest.
 */
class ElementImageTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     * Tests getCMSFields().
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(ElementImage::class, 'one');
        $this->assertInstanceOf(FieldList::class, $object->getCMSFields());
    }

    /**
     * Tests getType().
     */
    public function testGetType()
    {
        $object = $this->objFromFixture(ElementImage::class, 'one');
        $this->assertEquals($object->getType(), 'Image');
    }
}
