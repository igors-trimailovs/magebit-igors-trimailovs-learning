<?php
declare(strict_types=1);
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

namespace Magebit\Faq\Api;

/**
 * Faq Magagment Interface.
 * @api
 */
interface QuestionManagementInterface
{
    /**
     * Enable FAQ
     *
     * @param \Magebit\Faq\Api\Data\QuestionInterface $faq
     * @return boolean
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function enableQuestion(Data\QuestionInterface $faq): bool;

    /**
     * Disable FAQ
     *
     * @param \Magebit\Faq\Api\Data\QuestionInterface $faq
     * @return boolean
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function disableQuestion(Data\QuestionInterface $faq): bool;
}