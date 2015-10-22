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

use Gpupo\Tests\AdyenSdk\TestCaseAbstract;

abstract class AbstractDecorator extends TestCaseAbstract
{
    public function testGenericFields()
    {
        $decorator = $this->factoryDecorator();

        $this->assertEquals('8813760397300101', $decorator->getPspReference());
    }

}
