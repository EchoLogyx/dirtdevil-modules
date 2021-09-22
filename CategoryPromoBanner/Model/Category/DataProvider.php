<?php
namespace DirtDevil\CategoryPromoBanner\Model\Category;

class DataProvider extends \Magento\Catalog\Model\Category\DataProvider
{

    protected function getFieldsMap()
    {
        $fields = parent::getFieldsMap();
        $fields['category_promo_banner'][] = 'promo_banner_image'; // custom image field

        return $fields;
    }
}
