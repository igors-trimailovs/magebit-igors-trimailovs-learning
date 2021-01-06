<?php
/**
 * This file is part of the MageMastery FirstLayout package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade MageMastery FirstLayout
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2019 MageMastery, Ltd. (https://magebit.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MageMastery\FirstLayout\Controller\Page;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Page;

/**
 * Class View
 * @package MageMastery\FirstLayout\Controller\Page
 * @return Page
 */
class View extends Action
{
    public function execute()
    {
        /** @var Page $page */
        $page = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        return $page;
    }
}