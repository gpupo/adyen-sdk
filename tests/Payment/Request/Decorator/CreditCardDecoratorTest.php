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

namespace Gpupo\Tests\AdyenSdk\Payment\Request\Decorator;

use Gpupo\AdyenSdk\Payment\Request\Decorator\CreditCardDecorator;
use Gpupo\Tests\AdyenSdk\TestCaseAbstract;

class CreditCardDecoratorTest extends TestCaseAbstract
{
    public function testToJson()
    {
        $decorator = new CreditCardDecorator();
        $decorator->setRequest($this->factoryRequest());
        $array = json_decode($decorator->toJson(), true);

        $list = ['merchantAccount', 'reference', 'amount', 'shopperEmail',
            'shopperIP', 'merchantOrderReference', 'shopperReference',
            'installments', 'additionalData', ];
        foreach ($list as $key) {
            $this->assertArrayHasKey($key, $array);
        }
    }
}
