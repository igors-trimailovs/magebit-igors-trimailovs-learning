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

namespace Magebit\Faq\Model;

use Magebit\Faq\Api\Data\QuestionInterface;

/**
 * Class Faq
 * @package Magebit\Faq\Model
 */
class Question extends \Magento\Framework\Model\AbstractModel implements QuestionInterface
{

    /**
     * @inheritDoc
     */
    public function getId(): ?string
    {
        return $this->getData(self::ID);
    }

    /**
     * @inheritDoc
     */
    public function getQuestion(): ?string
    {
        return $this->getData(self::QUESTION);
    }

    /**
     * @inheritDoc
     */
    public function getAnswer(): ?string
    {
        return $this->getData(self::ANSWER);
    }

    /**
     * @inheritDoc
     */
    public function getStatus(): ?string
    {
        return $this->getData(self::STATUS);
    }

    /**
     * @inheritDoc
     */
    public function getPosition(): ?int
    {
        return $this->getData(self::POSITION);
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setQuestion($question): bool
    {
        $this->setData(self::QUESTION, $question);

        return true;
    }

    /**
     * @inheritDoc
     */
    public function setAnswer($answer): bool
    {
        $this->setData(self::ANSWER, $answer);

        return true;
    }

    /**
     * @inheritDoc
     */
    public function setStatus($status): bool
    {
        $this->setData(self::STATUS, $status);

        return true;
    }

    /**
     * @inheritDoc
     */
    public function setPosition($position): bool
    {
        $this->setData(self::POSITION, $position);

        return true;
    }


    /**
     * Init model
     */
    protected function _construct()
    {
        $this->_init(\Magebit\Faq\Model\ResourceModel\Question::class);
    }

}