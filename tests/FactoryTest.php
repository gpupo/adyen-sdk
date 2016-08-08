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

namespace Gpupo\Tests\AdyenSdk;

use Gpupo\AdyenSdk\Factory;
use Gpupo\Tests\CommonSdk\FactoryTestAbstract;

class FactoryTest extends FactoryTestAbstract
{
    public $namespace = '\Gpupo\AdyenSdk\\';

    public function getFactory()
    {
        return Factory::getInstance();
    }

    public function dataProviderObjetos()
    {
        return [
            [$this->namespace.'Payment\Request\Order\Order', 'order', null],
            [$this->namespace.'Payment\Request\Request', 'request', null],
        ];
    }
}
