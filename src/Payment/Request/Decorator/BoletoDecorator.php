<?php

/*
 * This file is part of gpupo/adyen-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\AdyenSdk\Payment\Request\Decorator;

class BoletoDecorator extends AbstractDecorator
{
    protected function getCustomFields()
    {
        $data = [
            'shopperStatement' => 'Não aceitar após o vencimento. Não aceitar o pagamento com cheque',
            'selectedBrand'    => 'boletobancario_santander',
            'deliveryDate'     => $this->getOrder()->getDeliveryDate(),
        ];

        $socialSecurityNumber = $this->getOrder()->getShopper()->getSocialSecurityNumber();

        if (!empty(intval($socialSecurityNumber))) {
            $data = array_merge($data, [
                'shopperName'          => $this->getOrder()->getShopper()->getFullName(),
                'socialSecurityNumber' => $socialSecurityNumber,
                'billingAddress'       => $this->getOrder()->getBillingAddress()->toArray(),
                'shopperName'          => $this->getOrder()->getShopper()->getArrayName(),
            ]);
        }

        return $data;
    }
}
