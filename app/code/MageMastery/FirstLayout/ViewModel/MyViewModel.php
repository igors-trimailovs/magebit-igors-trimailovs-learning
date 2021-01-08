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
namespace MageMastery\FirstLayout\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class MyViewModel implements ArgumentInterface
{

    /*
     * Test function
     * @return string
     */
    public function ping() {
        return 'pong';
    }


}