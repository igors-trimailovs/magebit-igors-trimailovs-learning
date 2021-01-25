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

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\FaqRepositoryInterface;
use Magebit\Faq\Api\Data;
use Magebit\Faq\Model\ResourceModel\Faq as ResourceFaq;
use Magebit\Faq\Model\ResourceModel\Faq\CollectionFactory as FaqCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magebit\Faq\Api\Data\FaqSearchResultsInterfaceFactory;
use Magebit\Faq\Api\Data\FaqInterfaceFactory;

/**
 * Class FaqRepository
 */
class FaqRepository implements FaqRepositoryInterface
{
    /**
     * @var ResourceFaq
     */
    protected $resource;

    /**
     * @var FaqFactory
     */
    protected $faqFactory;

    /**
     * @var FaqCollectionFactory
     */
    protected $faqCollectionFactory;

    /**
     * @var Data\FaqSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;


    /**
     * @var \Magebit\Faq\Api\Data\FaqInterfaceFactory
     */
    protected $dataFaqFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @param ResourceFaq $resource
     * @param FaqFactory $FaqFactory
     * @param Data\FaqInterfaceFactory $dataFaqFactory
     * @param FaqCollectionFactory $faqCollectionFactory
     * @param Data\FaqSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     */
    public function __construct(
        ResourceFaq $resource,
        FaqFactory $faqFactory,
        FaqInterfaceFactory $dataFaqFactory,
        FaqCollectionFactory $faqCollectionFactory,
        FaqSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->faqFactory = $faqFactory;
        $this->faqCollectionFactory = $faqCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataFaqFactory = $dataFaqFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * Save Faq data
     *
     * @param \Magebit\Faq\Api\Data\FaqInterface $faq
     * @return Faq
     * @throws CouldNotSaveException
     */
    public function save(Data\FaqInterface $faq)
    {
        try {
            $this->resource->save($faq);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $faq;
    }

    /**
     * Delete Faq
     *
     * @param \Magebit\Faq\Api\Data\FaqInterface $faq
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(Data\FaqInterface $faq)
    {
        try {
            $this->resource->delete($faq);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }

    /**
     * Load Faq data by given Faq Identity
     *
     * @param string $faqId
     * @return Faq
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($faqId)
    {
        $faq = $this->faqFactory->create();
        $this->resource->load($faq, $faqId);
        if (!$faq->getId()) {
            throw new NoSuchEntityException(__('The FAQ with the "%1" ID doesn\'t exist.', $faqId));
        }

        return $faq;
    }

    /**
     * Delete Faq by given Faq Identity
     *
     * @param string $faqId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($faqId)
    {
        return $this->delete($this->getById($faqId));
    }


    /**
     * Get FAQ list
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magento\Faq\Api\Data\FaqSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        $searchResult = $this->searchResultsFactory->create();
        $collection = $this->faqCollectionFactory->create();
        $this->collectionProcessor->process($criteria, $collection);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());

        return $searchResult;
    }

}
