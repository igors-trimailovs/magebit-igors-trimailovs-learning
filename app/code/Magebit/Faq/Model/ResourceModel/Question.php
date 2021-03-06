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

namespace Magebit\Faq\Model\ResourceModel;

use Magebit\Faq\Api\Data\QuestionInterface;

/**
 * Class Faq
 * @package Magebit\Faq\Model\ResourceModel
 */
class Question extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    const TABLE = 'magebit_faq_table';
    const idField = 'id';

    /**
     * Faq constructor.
     */
    protected function _construct()
    {
        $this->_init(QuestionInterface::TABLE, QuestionInterface::ID);
    }

}