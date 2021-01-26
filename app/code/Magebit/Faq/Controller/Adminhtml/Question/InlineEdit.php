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

namespace Magebit\Faq\Controller\Adminhtml\Question;

use Magento\Backend\App\Action\Context;
use Magebit\Faq\Model\QuestionFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magebit\Faq\Api\QuestionRepositoryInterface;

/**
 * Class InlineEdit
 * @package Magebit\Faq\Controller\Adminhtml\Faq
 */
class InlineEdit extends \Magento\Backend\App\Action
{

    /**
     * @var QuestionFactory
     */
    protected $questionFactory;

    /**
     * @var JsonFactory
     */
    protected $jsonFactory;

    /**
     * @var QuestionRepositoryInterface
     */
    protected $questionRepository;

    /**
     * InlineEdit constructor.
     * @param Context $context
     * @param FaqFactory $faqFactory
     * @param JsonFactory $jsonFactory
     */
    public function __construct(
        Context $context,
        QuestionFactory $questionFactory,
        JsonFactory $jsonFactory,
        QuestionRepositoryInterface $questionRepository
    ) {
        parent::__construct($context);
        $this->questionRepository = $questionRepository;
        $this->questionFactory = $questionFactory;
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
            try {
                $faq = $this->questionRepository->getById($faqId);
                $faq->setData(array_merge($faq->getData(), $postItems[$faqId]));
                $this->questionRepository->save($faq);
            } catch (\Exception $e) {
                $error = true;
                $messages[] = $e;
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }
}
