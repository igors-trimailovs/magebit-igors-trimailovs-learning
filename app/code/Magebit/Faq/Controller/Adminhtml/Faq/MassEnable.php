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

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Magebit\Faq\Model\ResourceModel\Faq\CollectionFactory;
use Magebit\Faq\Api\FaqManagementInterface;

/**
 * Class MassDelete
 */
class MassEnable extends \Magento\Backend\App\Action implements HttpPostActionInterface
{

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var FaqManagementInterface
     */
    protected $faqManagment;

    /**
     * @var CollectionFactory
     */
    protected $faqFactory;

    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        Filter $filter,
        FaqManagementInterface $faqManagment,
        CollectionFactory $faqFactory
    ) {
        $this->filter = $filter;
        $this->faqFactory = $faqFactory;
        $this->faqManagment = $faqManagment;
        parent::__construct($context);
    }

    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        /** @var CollectionFactory $collection */
        $collection = $this->filter->getCollection($this->faqFactory->create());
        $collectionSize = $collection->getSize();

        foreach ($collection as $faq) {
            $this->faqManagment->enableQuestion($faq);
        }

        $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been enabled.', $collectionSize));

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        return $resultRedirect->setPath('faq/index/index');
    }
}