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
        $this->assertEquals(422, $decorator->getCode());
        $this->assertEquals(422, $decorator->getStatus());
        $this->assertEquals(171, $decorator->getErrorCode());
        $this->assertEquals("validation", $decorator->getErrorType());
        $this->assertEquals('Unable to parse Generation Date', $decorator->getMessage());
    }

}
