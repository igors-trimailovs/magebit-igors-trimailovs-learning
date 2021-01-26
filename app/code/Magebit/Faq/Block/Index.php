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

namespace Magebit\Faq\Block;

use Magebit\Faq\Api\QuestionRepositoryInterface;
use Magento\Framework\Api\Filter;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SortOrderBuilder;

/**
 * Class Index
 * @package Magebit\Faq\Block
 */
class Index extends \Magento\Framework\View\Element\Template
{
    /**
     * @var QuestionRepositoryInterface
     */
    protected $questionRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var SortOrderBuilder
     */
    protected $sortOrderBuilder;

    /**
     * Index constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param QuestionRepositoryInterface $questionRepository
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        QuestionRepositoryInterface $questionRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        Filter $filter,
        SortOrderBuilder $sortOrderBuilder
    ) {
        $this->sortOrderBuilder = $sortOrderBuilder;
        $this->filter = $filter;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->questionRepository = $questionRepository;
        parent::__construct($context);
    }

    /**
     * Get All active FAQs
     * @return \Magebit\Faq\Model\ResourceModel\Question\Collection
     */
    public function getQuestions()
    {
        $this->sortOrderBuilder->setField('position')->setDescendingDirection();
        $this->searchCriteriaBuilder->addSortOrder($this->sortOrderBuilder->create());
        $this->searchCriteriaBuilder->addFilter('status', '1', 'eq');
        /** @var $data QuestionRepositoryInterface */
        $data = $this->questionRepository->getList($this->searchCriteriaBuilder->create())->getItems();

        return $data;
    }
}