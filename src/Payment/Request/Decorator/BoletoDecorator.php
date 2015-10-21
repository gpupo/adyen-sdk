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

class BoletoDecorator extends AbstractDecorator
{
    protected function getCustomFields()
    {
        return [
            'shopperName'           => $this->getOrder()->getShopper()->getFullName(),
            'socialSecurityNumber'  => $this->getOrder()->getShopper()->getSocialSecurityNumber(),
            'billingAddress'        => $this->getOrder()->getBillingAddress(),
            'shopperName'           => $this->getOrder()->getShopper()->getArrayName(),
            "shopperStatement"      => "Não aceitar após o vencimento. Não aceitar o pagamento com cheque",
            "selectedBrand"         => "boletobancario_bradesco",
            "deliveryDate"          => "2015-10-21T23:00:00.000Z",
        ];
    }
}
