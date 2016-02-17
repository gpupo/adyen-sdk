<?php

/*
 * This file is part of gpupo/adyen-sdk
 *
 * (c) Gilmar Pupo <g@g1mr.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For more information, see
 * <http://www.g1mr.com/adyen-sdk/>.
 */

namespace Gpupo\AdyenSdk\Payment\Request\Decorator;

class CaptureDecorator extends AbstractDecorator
{
    public function toArray()
    {
        return [
            'merchantAccount'        => $this->getRequest()->getMerchantAccount(),
            'modificationAmount'     => [
                'value' => $this->getOrder()->getAmountInt(),
                'currency' => 'BRL',
            ],
            'originalReference' => $this->getOrder()->get('pspReference'),
        ];
    }
}
