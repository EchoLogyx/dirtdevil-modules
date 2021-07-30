<?php

namespace DirtDevil\PromoBanner\Model\ResourceModel;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\ObjectManager;
use DirtDevil\PromoBanner\Model\Banner\ImageUploader;

class Banner extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * ImageUploader
     *
     * @var \DirtDevil\PromoBanner\Model\Banner\ImageUploader
     */
    protected $_imageUploader;

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('dirtdevil_banners_slider', 'id');
    }

    /**
     * Perform actions before object save
     *
     * @param \Magento\Framework\Model\AbstractModel|\Magento\Framework\DataObject $object
     * @return $this
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function _beforeSave(\Magento\Framework\Model\AbstractModel $object)
    {
        $name = $object->getPromobannerHeading();
        $url = $object->getPromobannerUrl();
        $image = $object->getPromobannerImage();


        if (empty($name)) {
            throw new LocalizedException(__('The banner name is required.'));
        }

        if (is_array($image)) {
            $object->setImage($image[0]['name']);
        }

        // if the URL not null then check the URL
        if (!empty($url) && !filter_var($url, FILTER_VALIDATE_URL)) {
            throw new LocalizedException(__('The URL Link is invalid.'));
        }

        return $this;
    }
 
    /**
     * Perform actions after object delete
     *
     * @param \Magento\Framework\Model\AbstractModel|\Magento\Framework\DataObject $object
     * @return $this
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function _afterDelete(\Magento\Framework\Model\AbstractModel $object)
    {
        $imageName = $object->getPromobannerImage();
        $this->_getImageUploader()->deleteImage($imageName);

        return $this;
    }

    /**
     * Get ImageUploader instance
     *
     * @return ImageUploader
     */
    private function _getImageUploader()
    {
        if ($this->_imageUploader === null) {
            $this->_imageUploader = ObjectManager::getInstance()->get(ImageUploader::class);
        }
        return $this->_imageUploader;
    }
}
