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

class CreditCardDecoratorTest extends abstractDecorator
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
        $this->assertEquals('Authorised', $decorator->getResultCode());
        $this->assertEquals('96821', $decorator->getAuthCode());
    }

}
