<?php

namespace DirtDevil\PromoBannerTwo\Controller\Adminhtml\Banner;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\TestFramework\Inspection\Exception;
use DirtDevil\PromoBannerTwo\Model\Banner\ImageUploader;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var ImageUploader
     */
    protected $imageUploader;

    /**
     * @param Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param ImageUploader $imageUploader
     */
    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor,
        ImageUploader $imageUploader
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->imageUploader = $imageUploader;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        // print_r($data);

        if ($data) {
            $id = $this->getRequest()->getParam('id');

            if (empty($data['id'])) {
                $data['id'] = null;
            }

            // $imageName = '';
            // if (!empty($data['promobanner_image'])) {
            //     $imageName = $data['promobanner_image'][0]['name'];
            // }

            if (isset($data['promobanner_image'][0]['name'])) {
                $data['promobanner_image'] = $data['promobanner_image'][0]['name'];
            } 

            


            // $data = $this->filterdatadd($data);
            

            /** @var \DirtDevil\PromoBannerTwo\Model\Banner $model */
            $model = $this->_objectManager->create('DirtDevil\PromoBannerTwo\Model\Banner')->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This banner no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            // $model->setData("promobanner_image", $data['promobanner_image'][0]['name']);

            $model->setData($data);

            try {
                $model->save();
                if ($data['promobanner_image']) {
                    $this->imageUploader->moveFileFromTmp($data['promobanner_image']);
                }
                $this->messageManager->addSuccess(__('You saved the banner.'));
                $this->dataPersistor->clear('banners_slider');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                $this->messageManager->addException($e, __('Something went wrong while saving the banner.'));
            }

            $this->dataPersistor->set('banners_slider', $data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }



    // public function filterdatadd(array $rawData)
    // {
    //     $data = $rawData;
    //     if (isset($data['promobanner_image'][0]['name'])) {
    //         $data['promobanner_image'] = $data['promobanner_image'][0]['name'];
    //     } else {
    //         $data['promobanner_image'] = null;
    //     }
    //     return $data;
    // }
    
    

    /**
     * Authorization level of a basic admin session
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('DirtDevil_PromoBannerTwo::banner_update') || $this->_authorization->isAllowed('DirtDevil_PromoBannerTwo::banner_create') || $this->_authorization->isAllowed('DirtDevil_PromoBannerTwo::banner_delete');
    }
}





