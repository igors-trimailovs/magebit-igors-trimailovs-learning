<?php
/**
 * This file is part of the Magebit Faq package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magebit Faq
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2019 Magebit, Ltd. (https://magebit.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Magebit\Faq\Model\ResourceModel;

/**
 * Class Faq
 * @package Magebit\Faq\Model\ResourceModel
 */
class Faq extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Faq constructor.
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     */
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    /**
     * Faq constructor.
     */
    protected function _construct()
    {
        $this->_init('magebit_faq_table', 'id');
    }

}