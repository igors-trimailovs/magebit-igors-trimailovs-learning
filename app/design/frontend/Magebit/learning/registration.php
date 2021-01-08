<?php
/**
 * This file is part of the Magebit learning theme.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magebit learning theme
 * to newer versions in the future.
 *
 * @copyright Copyright (c) 2019 Magebit, Ltd. (https://magebit.com/)
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use \Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::THEME,
    'frontend/Magebit/learning',
    __DIR__
);