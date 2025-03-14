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

namespace BuyBox\Payment\Gateway\Request;

use BuyBox\Payment\Gateway\Config\Config;
use BuyBox\Payment\Model\RestClient;
use Magento\Payment\Gateway\Helper\SubjectReader;
use Magento\Payment\Gateway\Request\BuilderInterface;

class CaptureBuilder implements BuilderInterface
{
    /**
     * Builds Capture request.
     */
    public function build(array $buildSubject): array
    {
        $paymentDo = SubjectReader::readPayment($buildSubject);
        $payment = $paymentDo->getPayment();

        return [
            RestClient::KEY_METHOD           => Config::METHOD_DO_CAPTURE,
            RestClient::KEY_AUTHORIZATION_ID => $payment->getLastTransId(),
            RestClient::KEY_COMPLETE_TYPE    => 'Complete',
        ];
    }
}
