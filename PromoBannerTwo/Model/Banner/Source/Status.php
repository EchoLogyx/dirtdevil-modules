<?php

namespace DirtDevil\PromoBannerTwo\Model\Banner\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class Status
 */
class Status implements OptionSourceInterface
{
    /**
     * @var \DirtDevil\PromoBannerTwo\Model\Banner
     */
    protected $banner;

    /**
     * Constructor
     *
     * @param \DirtDevil\PromoBannerTwo\Model\Banner $banner
     */
    public function __construct(\DirtDevil\PromoBannerTwo\Model\Banner $banner)
    {
        $this->banner = $banner;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $availableOptions = $this->banner->getAvailableStatuses();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
