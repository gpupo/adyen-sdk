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

use Gpupo\AdyenSdk\Payment\Response\Decorator\RefundDecorator;

class RefundDecoratorTest extends AbstractDecorator
{
    protected function factoryDecorator()
    {
        $instance = new RefundDecorator($this->getData('response.refund'));
        $instance->setCode(200);

        return $instance;
    }

    public function testCustomFields()
    {
        $decorator = $this->factoryDecorator();
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Payment\Response\SuccessInterface', $decorator);
        $this->assertSame('[refund-received]', $decorator->getResponse());
        $this->assertSame('8312534564722331', $decorator->getPspReference());
    }
}
