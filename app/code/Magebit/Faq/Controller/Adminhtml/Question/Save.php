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

use Magento\Backend\App\Action;
use Magebit\Faq\Model\QuestionFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magebit\Faq\Api\QuestionRepositoryInterface;

/**
 * Class Save
 * @package Magebit\Faq\Controller\Adminhtml\Faq
 */
class Save extends Action implements HttpPostActionInterface
{
    /**
     * @var QuestionFactory
     */
    protected $questionFactory;

    /**
     * @var QuestionRepositoryInterface
     */
    protected $questionRepository;

    /**
     * Save constructor.
     * @param Context $context
     * @param QuestionFactory|null $questionFactory
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        QuestionFactory $questionFactory,
        PageFactory $resultPageFactory,
        QuestionRepositoryInterface $questionRepository
    ) {
        $this->questionRepository = $questionRepository;
        $this->questionFactory = $questionFactory;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Save FAQ
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $model = $this->questionFactory->create()->setData($this->getRequest()->getPostValue());
        try {
            $this->questionRepository->save($model);
        } catch (\Exception $e) {
            return $this->resultRedirectFactory->create()->setPath('faq/index/index');
        }


        return $this->resultRedirectFactory->create()->setPath('faq/index/index');
    }
}