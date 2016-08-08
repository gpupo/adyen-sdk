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

namespace Gpupo\Tests\AdyenSdk\Payment\Response\Decorator;

use Gpupo\AdyenSdk\Payment\Response\Decorator\ProblematicDecorator;

class ProblematicDecoratorTest extends AbstractDecorator
{
    protected function factoryDecorator()
    {
        $instance = new ProblematicDecorator($this->getData('response.problematic'));
        $instance->setCode(422);

        return $instance;
    }

    public function testCustomFields()
    {
        $decorator = $this->factoryDecorator();
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Payment\Response\FailInterface', $decorator);
        $this->assertSame(422, $decorator->getCode());
        $this->assertSame(422, $decorator->getStatus());
        $this->assertSame(171, $decorator->getErrorCode());
        $this->assertSame('validation', $decorator->getErrorType());
        $this->assertSame('Unable to parse Generation Date', $decorator->getMessage());
    }
}
