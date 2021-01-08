<?php
/**
 * This file is part of the Magebit PageListWidget package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magebit PageListWidge
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2019 Magebit, Ltd. (https://magebit.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Magebit\PageListWidget\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class DataOptions
 * @package Magebit\PageListWidget\Model\Config\Source
 */
class DataOptions implements ArrayInterface
{

    /**
     * DataOptions constructor.
     * @param \Magento\Cms\Api\PageRepositoryInterface $pageRepository
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        \Magento\Cms\Api\PageRepositoryInterface $pageRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->_cmsPage = $pageRepository;
        $this->_search = $searchCriteriaBuilder;
    }

    /**
     * Returns CMS Pages
     * @return array
     */
    public function toOptionArray()
    {
        /** var @array */
        $pages = [];

        foreach($this->_cmsPage->getList($this->_getSearchCriteria())->getItems() as $page) {
            $pages[] = [
                'value' => $page->getIdentifier(),
                'label' => $page->getTitle()
            ];
        }

        return $pages;
    }

    /**
     * @return \Magento\Framework\Api\SearchCriteria
     */
    protected function _getSearchCriteria()
    {
        return $this->_search->addFilter('is_active', '1')->create();
    }
}