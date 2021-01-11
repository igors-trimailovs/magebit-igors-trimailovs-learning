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
        Context $context
    ) {
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->resultRedirectFactory->create()->setPath('faq/index/index');
    }
}