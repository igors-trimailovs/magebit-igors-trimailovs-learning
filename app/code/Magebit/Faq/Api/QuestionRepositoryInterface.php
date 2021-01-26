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
 * Faq CRUD interface.
 * @api
 */
interface QuestionRepositoryInterface
{

    /**
     * Save faq.
     *
     * @param \Magebit\Faq\Api\Data\QuestionInterface $faq
     * @return \Magebit\Faq\Api\Data\QuestionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(Data\QuestionInterface $faq): \Magebit\Faq\Api\Data\QuestionInterface;

    /**
     * Retrieve faq by id
     *
     * @param integer $faqId
     * @return \Magebit\Faq\Api\Data\QuestionInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($faqId): \Magebit\Faq\Api\Data\QuestionInterface;

    /**
     * Retrieve FAQ matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magebit\Faq\Api\Data\QuestionSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria): \Magebit\Faq\Api\Data\QuestionSearchResultsInterface;

    /**
     * Delete faq.
     *
     * @param \Magebit\Faq\Api\Data\QuestionInterface $faq
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(Data\QuestionInterface $faq): bool;

    /**
     * Delete faq by ID.
     *
     * @param int $faqId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($faqId): bool;
}
