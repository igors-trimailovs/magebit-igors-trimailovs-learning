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

use Magento\Backend\App\Action\Context;
use Magebit\Faq\Model\FaqFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magebit\Faq\Api\FaqRepositoryInterface;

/**
 * Class InlineEdit
 * @package Magebit\Faq\Controller\Adminhtml\Faq
 */
class InlineEdit extends \Magento\Backend\App\Action
{

    /**
     * @var FaqFactory
     */
    protected $faqFactory;

    /**
     * @var JsonFactory
     */
    protected $jsonFactory;

    /**
     * @var FaqRepositoryInterface
     */
    protected $faqRepository;

    /**
     * InlineEdit constructor.
     * @param Context $context
     * @param FaqFactory $faqFactory
     * @param JsonFactory $jsonFactory
     */
    public function __construct(
        Context $context,
        FaqFactory $faqFactory,
        JsonFactory $jsonFactory,
        FaqRepositoryInterface $faqRepository
    ) {
        parent::__construct($context);
        $this->faqRepository = $faqRepository;
        $this->faqFactory = $faqFactory;
        $this->jsonFactory = $jsonFactory;
    }

    /**
     * Inline edit FAQ
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Json|\Magento\Framework\Controller\ResultInterface
     * @throws \Exception
     */
    public function execute()
    {
        /** @var JsonFactory $resultJson */
        $resultJson = $this->jsonFactory->create();
        /** @var bool $error */
        $error = false;
        /** @var array $messages */
        $messages = [];
        /** @var array $postItems */
        $postItems = $this->getRequest()->getParam('items', []);

        foreach (array_keys($postItems) as $faqId) {
            $faq = $this->faqFactory->create()->load($faqId);
            $faq->setData(array_merge($faq->getData(), $postItems[$faqId]));
            $this->faqRepository->save($faq);
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }
}
