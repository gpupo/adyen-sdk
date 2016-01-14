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

namespace Gpupo\Tests\AdyenSdk\Payment\Response\Decorator;

use Gpupo\AdyenSdk\Payment\Response\Decorator\CreditCardDecorator;

class CreditCardDecoratorTest extends AbstractDecorator
{
    protected function factoryDecorator()
    {
        $instance = new CreditCardDecorator($this->getData('response.cc'));
        $instance->setCode(200);

        return $instance;
    }

    public function testCustomFields()
    {
        $decorator = $this->factoryDecorator();
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Payment\Response\SuccessInterface', $decorator);
        $this->assertSame('8813760397300101', $decorator->getPspReference());
        $this->assertSame('Authorised', $decorator->getResultCode());
        $this->assertSame('96821', $decorator->getAuthCode());
    }
}
