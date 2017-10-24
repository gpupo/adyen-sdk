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

namespace Gpupo\Tests\AdyenSdk\Payment\Request\Decorator;

use Gpupo\AdyenSdk\Payment\Request\Decorator\BoletoDecorator;
use Gpupo\Tests\AdyenSdk\TestCaseAbstract;

class BoletoDecoratorTest extends TestCaseAbstract
{
    public function testToJson()
    {
        $decorator = new BoletoDecorator();
        $decorator->setRequest($this->factoryRequest());
        $array = json_decode($decorator->toJson(), true);

        $list = ['merchantAccount', 'reference', 'amount', 'shopperEmail',
            'shopperIP', 'merchantOrderReference', 'shopperName',
            'socialSecurityNumber', 'billingAddress', 'shopperStatement',
            'selectedBrand', 'deliveryDate', ];

        foreach ($list as $key) {
            $this->assertArrayHasKey($key, $array);
        }
    }
}
