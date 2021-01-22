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
use Magebit\Faq\Model\FaqFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magebit\Faq\Api\FaqRepositoryInterface;

/**
 * Class Save
 * @package Magebit\Faq\Controller\Adminhtml\Faq
 */
class Save extends Action implements HttpPostActionInterface
{
    /**
     * @var FaqFactory
     */
    protected $faqFactory;

    /**
     * @var FaqRepositoryInterface
     */
    protected $faqRepository;

    /**
     * Save constructor.
     * @param Context $context
     * @param FaqFactory|null $faqFactory
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        FaqFactory $faqFactory,
        PageFactory $resultPageFactory,
        FaqRepositoryInterface $faqRepository
    ) {
        $this->faqRepository = $faqRepository;
        $this->faqFactory = $faqFactory;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Save FAQ
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $model = $this->faqFactory->create()->setData($this->getRequest()->getPostValue()['general']);
        $this->faqRepository->save($model);

        return $this->resultRedirectFactory->create()->setPath('faq/index/index');
    }
}