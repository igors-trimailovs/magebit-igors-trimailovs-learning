<?php
/**
 * This file is part of the MageMastery FirstModule package.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade MageMastery FirstModule
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2019 MageMastery, Ltd. (https://magebit.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'MageMastery_FirstModule',
    __DIR__
);