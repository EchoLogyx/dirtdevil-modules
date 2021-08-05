<?php
namespace DirtDevil\PromoBannerTwo\Model\Banner;

use DirtDevil\PromoBannerTwo\Model\ResourceModel\Banner\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ObjectManager;
use Magento\Store\Model\StoreManagerInterface;

use Magento\Framework\Filesystem;


class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    protected $collection;
    protected $dataPersistor;
    protected $loadedData;
    protected $storeManager;
    
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $bannerCollectionFactory,
        DataPersistorInterface $dataPersistor,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $bannerCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        $this->storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();

   

        

        foreach ($items as $banner) {
            $this->loadedData[$banner->getId()] = $banner->getData();
            if ($banner->getPromobannerImage()) {
                $m['promobanner_image'][0]['name'] = $banner->getPromobannerImage();
                $m['promobanner_image'][0]['url'] = $this->getMediaUrl() . $banner->getPromobannerImage();
                $fullData = $this->loadedData;
                $this->loadedData[$banner->getId()] = array_merge($fullData[$banner->getId()], $m);
            }
        }

        // Used from the Save action
        $data = $this->dataPersistor->get('banners_slider');
        if (!empty($data)) {
            $banner = $this->collection->getNewEmptyItem();
            $banner->setData($data);
            $this->loadedData[$banner->getId()] = $banner->getData();
            $this->dataPersistor->clear('banners_slider');
        }

        return $this->loadedData;
    }



    public function getMediaUrl()
    {
        $mediaUrl = $this->storeManager->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'dirtdevil/banners_slider_two/';
        return $mediaUrl;
    }


}
