<?php

namespace Magebit\Faq\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;
use Magebit\Faq\Model\FaqFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;


class Save extends Action implements HttpPostActionInterface
{
    private $faqFactory;

    public function __construct(
        Context $context,
        FaqFactory $faqFactory
    ) {
        parent::__construct($context);
        $this->faqFactory = $faqFactory;
    }

    public function execute()
    {
        $this->faqFactory->create()
            ->setData($this->getRequest()->getPostValue()['general'])
            ->save();

        return $this->resultRedirectFactory->create()->setPath('faq/index/index');
    }
}