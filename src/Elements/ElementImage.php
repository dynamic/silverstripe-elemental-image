<?php

namespace Dynamic\Elements\Image\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\FieldType\DBField;

/**
 * Class ElementImage.
 */
class ElementImage extends BaseElement
{
    /**
     * @var string
     */
    private static $icon = 'font-icon-block-file';

    /**
     * @return string
     */
    private static $singular_name = 'Image Element';

    /**
     * @return string
     */
    private static $plural_name = 'Image Elements';

    /**
     * @var string
     */
    private static $table_name = 'ElementImage';

    /**
     * @var array
     */
    private static $has_one = [
        'Image' => Image::class,
    ];

    /**
     * @var array
     */
    private static $owns = [
        'Image',
    ];

    /**
     * @return \SilverStripe\Forms\FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $imageField = $fields->fieldByName('Root.Main.Image')
            ->setFolderName('Uploads/ElementImage')
            ->setAllowedFileCategories('image');
        if ($imageField instanceof UploadField) {
            $imageField->setAllowedMaxFileNumber(1);
        }

        return $fields;
    }

    /**
     * @return DBHTMLText
     */
    public function getSummary()
    {
        if ($this->Image()->exists()) {
            return DBField::create_field('HTMLText', $this->Image()->Name)->Summary(20);
        }
    }

    /**
     * @return array
     */
    protected function provideBlockSchema()
    {
        $blockSchema = parent::provideBlockSchema();
        $blockSchema['content'] = $this->getSummary();

        return $blockSchema;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Image');
    }
}
