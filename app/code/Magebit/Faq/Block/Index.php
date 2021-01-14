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

/**
 * Class Index
 * @package Magebit\Faq\Block
 */
class Index extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magebit\Faq\Model\ResourceModel\Faq\CollectionFactory
     */
    protected $faqCollection;

    /**
     * Index constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magebit\Faq\Model\ResourceModel\Faq\CollectionFactory $faqCollection
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magebit\Faq\Model\ResourceModel\Faq\CollectionFactory $faqCollection
    ) {
        $this->faqCollection = $faqCollection;
        parent::__construct($context);
    }

    /**
     * Get All active FAQs
     * @return \Magebit\Faq\Model\ResourceModel\Faq\Collection
     */
    public function getFAQs()
    {
        /** @var $data \Magebit\Faq\Model\ResourceModel\Faq\CollectionFactory */
        $data = $this->faqCollection->create();
        $data->addFieldToFilter('status', ['eq' => '1']);

        return $data;
    }
}