<?php

namespace DirtDevil\CategoryPromoBanner\Model\Category;

class DataProvider extends \Magento\Catalog\Model\Category\DataProvider
{

    protected function getFieldsMap() 
    {
        $fields = parent::getFieldsMap();
        $fields['product_listing_banners'][] = 'plp_banner_image_1'; // custom image field
        $fields['product_listing_banners'][] = 'plp_banner_image_2'; // custom image field
        $fields['product_listing_banners'][] = 'plp_banner_image_3'; // custom image field
        $fields['product_listing_banners'][] = 'plp_banner_brand_1'; // custom image field
        $fields['product_listing_banners'][] = 'plp_banner_brand_2'; // custom image field
        $fields['product_listing_banners'][] = 'plp_banner_brand_3'; // custom image field
        return $fields;
    }
}
