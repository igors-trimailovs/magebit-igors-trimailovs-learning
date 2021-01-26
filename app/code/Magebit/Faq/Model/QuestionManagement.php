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

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\Data;
use Magebit\Faq\Model\ResourceModel\Question as ResourceFaq;
use Magebit\Faq\Api\QuestionManagementInterface;

class QuestionManagement implements QuestionManagementInterface
{
    /**
     * @var ResourceFaq
     */
    protected $resource;

    /**
     * FaqManagement constructor.
     * @param ResourceFaq $resource
     */
    public function __construct(ResourceFaq $resource)
    {
        $this->resource = $resource;
    }

    /**
     * Enable question
     */
    public function enableQuestion(Data\QuestionInterface $faq): bool
    {
        $faq->setStatus(Data\QuestionInterface::ENABLED);
        try {
            $this->resource->save($faq);

            return true;
        } catch (\Exception $e) {
            return false;
        }

    }

    /**
     * Disable question
     */
    public function disableQuestion(Data\QuestionInterface $faq): bool
    {
        $faq->setStatus(Data\QuestionInterface::DISABLED);
        try {
            $this->resource->save($faq);

            return true;
        } catch (\Exception $e) {
            return false;
        }

    }
}