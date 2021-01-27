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

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Backend\App\Action\Context;
use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magebit\Faq\Model\Question;
use Magebit\Faq\Model\QuestionFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Framework\App\Request\Http;

/**
 * Save FAQ action.
 */
class Save extends \Magento\Backend\App\Action implements HttpPostActionInterface
{

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $coreRegistry;


    /**
     * @var QuestionFactory
     */
    protected $questionFactory;

    /**
     * @var QuestionRepositoryInterface
     */
    protected $questionRepository;

    /**
     * @var Http
     */
    protected $request;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param QuestionFactory $questionFactory
     * @param QuestionRepositoryInterface $questionRepository
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        QuestionFactory $questionFactory,
        QuestionRepositoryInterface $questionRepository,
        Http $request
    ) {
        $this->request = $request;
        $this->coreRegistry = $coreRegistry;
        $this->questionFactory = $questionFactory;
        $this->questionRepository = $questionRepository;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->request->getPostValue();
        if ($data) {
            if (isset($data['status']) && $data['status'] === 'true') {
                $data['status'] = Question::ENABLED;
            }
            if (empty($data['_id'])) {
                $data['id'] = null;
            }
            $data['updated_at'] = 's';

            /** @var \Magebit\Faq\Model\Question $model */
            $model = $this->questionFactory->create();

            $id = $this->getRequest()->getParam('id');
            if ($id) {
                try {
                    $model = $this->questionRepository->getById($id);
                } catch (LocalizedException $e) {
                    $this->messageManager->addErrorMessage(__('This block no longer exists.'));
                    return $resultRedirect->setPath('faq/index/index');
                }
            }

            $model->setData($data);

            try {
                $this->questionRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the block.'));
                $data['back'] = null;
                return $this->processBlockReturn($model, $data, $resultRedirect);
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the block.'));
            }

            return $resultRedirect->setPath('faq/question/edit', ['id' => $id]);
        }
        return $resultRedirect->setPath('faq/index/index');
    }

    /**
     * @param $model
     * @param $data
     * @param $resultRedirect
     * @return mixed
     * @throws LocalizedException
     */
    private function processBlockReturn($model, $data, $resultRedirect)
    {
        if ($data['back'] === null) {
            $redirect = 'close';
        } else {
            $redirect = $data['back'];
        }

        if ($redirect ==='continue') {
            $resultRedirect->setPath('faq/question/edit', ['id' => $model->getId()]);
        } else if ($redirect === 'close') {
            $resultRedirect->setPath('faq/index/index');
        } else if ($redirect === 'duplicate') {
            $duplicateModel = $this->questionFactory->create(['data' => $data]);
            $duplicateModel->setId(null);
            $this->questionRepository->save($duplicateModel);
            $id = $duplicateModel->getId();
            $this->messageManager->addSuccessMessage(__('You duplicated the block.'));
            $resultRedirect->setPath('faq/question/edit', ['id' => $id]);
        }

        return $resultRedirect;
    }
}
