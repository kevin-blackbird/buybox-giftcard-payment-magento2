<?php
/**
 * BuyBox Gift Card payment module for Magento.
 *
 * LICENSE: This source file is subject to the version 3.0 of the Open
 * Software License (OSL-3.0) that is available through the world-wide-web
 * at the following URI: http://opensource.org/licenses/OSL-3.0.
 *
 * @author    Studiolab <contact@studiolab.fr>
 * @license   http://opensource.org/licenses/OSL-3.0
 *
 * @see      https://www.buybox.net/
 */

declare(strict_types=1);

namespace BuyBox\Payment\Model\Adminhtml\Source;

use BuyBox\Payment\Gateway\Config\Config;
use Magento\Framework\Data\OptionSourceInterface;

class Environment implements OptionSourceInterface
{
    public const DEFAULT_OPTION_LABEL = '-- Please Select --';

    /**
     * Possible actions on order place.
     */
    public function toOptionArray(): array
    {
        return [
            [
                'value' => '',
                'label' => __(self::DEFAULT_OPTION_LABEL),
            ],
            [
                'value' => Config::ENVIRONMENT_SANDBOX,
                'label' => __('Sandbox'),
            ],
            [
                'value' => Config::ENVIRONMENT_PRODUCTION,
                'label' => __('Production'),
            ]
        ];
    }
}
