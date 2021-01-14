<?php
/**
 * This file is part of the Magebit Faq package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magebit Faq
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2020 Magebit, Ltd. (https://magebit.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Magebit\Faq\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;

/**
 * Class Edit
 * @package Magebit\Faq\Controller\Adminhtml\Faq
 */
class Edit extends Action implements HttpGetActionInterface
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \Magebit\Faq\Model\FaqFactory
     */
    protected $faqFactory;

    /**
     * Edit constructor.
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magebit\Faq\Model\FaqFactory $faqFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magebit\Faq\Model\FaqFactory $faqFactory
    ) {
        $this->faqFactory = $faqFactory;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Edit FAQ
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /** @var int $id */
        $id = $this->getRequest()->getParam('id');
        /** @var \Magebit\Faq\Model\Faq $model */
        $model = $this->faqFactory->create()->load($id);
        /** @var  $resultPage */
        $resultPage = $this->resultPageFactory->create();

        return $resultPage;
    }
}
