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

namespace Magebit\Faq\Api\Data;

/**
 * FAQ interface.
 * @api
 * @since 100.0.2
 */
interface QuestionInterface
{
    /**
     * Database table name
     */
    const TABLE = 'magebit_faq_table';


    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ID = 'id';
    const QUESTION = 'question';
    const ANSWER = 'answer';
    const STATUS = 'status';
    const POSITION = 'position';
    const UPDATED_AT = 'updated_at';
    /**#@-*/

    /**#@+
     * Question status
     */
    const ENABLED = 1;
    const DISABLED = 0;
    /**#@-*/

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId(): ?string;

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion(): ?string;

    /**
     * Get answer
     *
     * @return string|null
     */
    public function getAnswer(): ?string;

    /**
     * Get status
     *
     * @return string|null
     */
    public function getStatus(): ?string;

    /**
     * Get position
     *
     * @return string|null
     */
    public function getPosition(): ?int;

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdatedAt(): ?string;

    /**
     * Set question
     *
     * @param string $question
     * @return QuestionInterface
     */
    public function setQuestion(string $question): QuestionInterface;

    /**
     * Set answer
     *
     * @param string $answer
     * @return QuestionInterface
     */
    public function setAnswer(string $answer): QuestionInterface;

    /**
     * Set status
     *
     * @param string $status
     * @return QuestionInterface
     */
    public function setStatus(string $status): QuestionInterface;

    /**
     * Set position
     *
     * @param string $position
     * @return QuestionInterface
     */
    public function setPosition(int $position): QuestionInterface;

}
