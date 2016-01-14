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

use Gpupo\AdyenSdk\Payment\Response\Decorator\CaptureDecorator;

class CaptureDecoratorTest extends AbstractDecorator
{
    protected function factoryDecorator()
    {
        $instance = new CaptureDecorator($this->getData('response.capture'));
        $instance->setCode(200);

        return $instance;
    }

    public function testCustomFields()
    {
        $decorator = $this->factoryDecorator();
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Payment\Response\SuccessInterface', $decorator);
        $this->assertSame('[capture-received]', $decorator->getResponse());
        $this->assertSame('8413547924770610', $decorator->getPspReference());
    }
}
