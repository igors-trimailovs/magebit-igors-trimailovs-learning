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

namespace Magebit\Faq\Api;

/**
 * Faq Magagment Interface.
 * @api
 */
interface FaqManagementInterface
{
    /**
     * Enable FAQ
     *
     * @param \Magebit\Faq\Api\Data\FaqInterface $faq
     * @return boolean
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function enableQuestion(Data\FaqInterface $faq);

    /**
     * Disable FAQ
     *
     * @param \Magebit\Faq\Api\Data\FaqInterface $faq
     * @return boolean
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function disableQuestion(Data\FaqInterface $faq);
}