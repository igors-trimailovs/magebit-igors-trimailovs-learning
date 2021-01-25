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

use Magebit\Faq\Api\Data\FaqInterface;

/**
 * Class Faq
 * @package Magebit\Faq\Model
 */
class Faq extends \Magento\Framework\Model\AbstractModel implements FaqInterface
{

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return parent::getData(self::ID);
    }

    /**
     * @inheritDoc
     */
    public function getQuestion()
    {
        return parent::getData(self::QUESTION);
    }

    /**
     * @inheritDoc
     */
    public function getAnswer()
    {
        return parent::getData(self::ANSWER);
    }

    /**
     * @inheritDoc
     */
    public function getStatus()
    {
        return parent::getData(self::STATUS);
    }

    /**
     * @inheritDoc
     */
    public function getPosition()
    {
        return parent::getData(self::POSITION);
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt()
    {
        return parent::getData(self::UPDATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setQuestion($question)
    {
        return parent::setData(self::QUESTION, $question);
    }

    /**
     * @inheritDoc
     */
    public function setAnswer($answer)
    {
        return parent::setData(self::ANSWER, $answer);
    }

    /**
     * @inheritDoc
     */
    public function setStatus($status)
    {
        return parent::setData(self::STATUS, $status);
    }

    /**
     * @inheritDoc
     */
    public function setPosition($position)
    {
        return parent::setData(self::POSITION, $position);
    }


    /**
     * Init model
     */
    protected function _construct()
    {
        $this->_init('Magebit\Faq\Model\ResourceModel\Faq');
    }

}