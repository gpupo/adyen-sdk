<?php

/*
 * This file is part of gpupo/adyen-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 */

namespace Gpupo\AdyenSdk\Payment\Request\Decorator;

class CaptureDecorator extends AbstractDecorator
{
    public function toArray()
    {
        return [
            'merchantAccount'    => $this->getRequest()->getMerchantAccount(),
            'modificationAmount' => [
                'value'    => $this->getOrder()->getAmountInt(),
                'currency' => 'BRL',
            ],
            'originalReference' => $this->getOrder()->get('pspReference'),
        ];
    }
}
