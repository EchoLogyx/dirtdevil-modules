<?php

namespace DirtDevil\PromoBannerTwo\Controller\Adminhtml\Banner;

use Magento\Framework\Controller\ResultFactory;

/**
 * Class Upload
 */
class Upload extends \Magento\Backend\App\Action
{

    protected $imageUploader;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \DirtDevil\PromoBannerTwo\Model\Banner\ImageUploader $imageUploader
    ) {
        parent::__construct($context);
        $this->imageUploader = $imageUploader;
    }


    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('DirtDevil_PromoBannerTwo::banner_read') || $this->_authorization->isAllowed('DirtDevil_PromoBannerTwo::banner_create');
    }


    public function execute()
    {
        try {
            $result = $this->imageUploader->saveFileToTmpDir('promobanner_image');

            $result['cookie'] = [
                'name' => $this->_getSession()->getName(),
                'value' => $this->_getSession()->getSessionId(),
                'lifetime' => $this->_getSession()->getCookieLifetime(),
                'path' => $this->_getSession()->getCookiePath(),
                'domain' => $this->_getSession()->getCookieDomain(),
            ];
        } catch (\Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}
