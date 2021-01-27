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

namespace Magebit\Faq\Ui\DataProvider\Faq\Listing;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

/**
 * Class Collection
 * @package Magebit\Faq\Ui\DataProvider\Faq\Listing
 */
class Collection extends SearchResult
{
    /**
    * Override _initSelect to add custom columns
    *
    * @return void
    */
    protected function _initSelect()
    {
        parent::_initSelect();
    }
}