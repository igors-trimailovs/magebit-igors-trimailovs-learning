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

namespace Magebit\PageListWidget\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

/**
 * Class PageList
 * @package Magebit\PageListWidget\Block\Widget
 */
class PageList extends Template implements BlockInterface
{
    /**
     * PHTML template for widget
     */
    protected $_template = "widget/pagelist.phtml";

    public function __construct(
        Template\Context $context,
        array $data = [],
        \Magento\Cms\Api\PageRepositoryInterface $pageRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
)
    {
        parent::__construct($context, $data);
        $this->_cmsPage = $pageRepository;
        $this->_search = $searchCriteriaBuilder;
    }

    /**
     * Get cms pages to template
     * return @array
     */
    public function getCmsPages() {

        /** var @array */
        $pages = [];

        foreach($this->_cmsPage->getList($this->_getSearchCriteria())->getItems() as $page) {
            $pages[] = $page->getTitle();
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