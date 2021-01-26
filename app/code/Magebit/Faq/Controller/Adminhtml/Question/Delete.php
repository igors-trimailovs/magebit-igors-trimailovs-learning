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
use Magento\Framework\App\Action\HttpPostActionInterface as HttpPostActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magebit\Faq\Api\QuestionRepositoryInterface;

/**
 * Class Delete
 * @package Magebit\Faq\Controller\Adminhtml\Faq
 */
class Delete extends Action implements HttpPostActionInterface
{
    /**
     * @var Magebit\Faq\Model\QuestionFactory $questionFactory
     */
    protected $questionFactory;

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var QuestionRepositoryInterface
     */
    protected $questionRepository;

    /**
     * Delete constructor.
     * @param Context $context
     * @param FaqFactory|null $faqFactory
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        questionFactory $questionFactory,
        PageFactory $resultPageFactory,
        QuestionRepositoryInterface $questionRepository
    ) {
        $this->questionRepository = $questionRepository;
        $this->questionFactory = $questionFactory;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Delete Faq
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Redirect|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var PageFactory $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        /** @var int $id */
        $id = $this->getRequest()->getParam('id');

        if ($id) {
            try {
                $this->questionRepository->deleteById($id);

                return $resultRedirect->setPath('faq/index/index');
            } catch (\Exception $e) {

                return $resultRedirect->setPath('faq/question/edit');
            }
        }

        return $resultRedirect->setPath('faq/index/index');
    }
}
