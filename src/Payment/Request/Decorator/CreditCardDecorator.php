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

class CreditCardDecorator extends AbstractDecorator
{
    protected function getCustomFields()
    {
        return [
            'additionalData' => [
                'card.encrypted.json' => $this->getRequest()->getEncryptedData(),
            ],
        ];
    }

}
