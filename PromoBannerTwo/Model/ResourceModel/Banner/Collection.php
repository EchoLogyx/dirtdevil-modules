<?php

namespace DirtDevil\PromoBannerTwo\Model\ResourceModel\Banner;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('DirtDevil\PromoBannerTwo\Model\Banner', 'DirtDevil\PromoBannerTwo\Model\ResourceModel\Banner');
    }
}
