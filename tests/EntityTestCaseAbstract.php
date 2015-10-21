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

namespace Gpupo\Tests\AdyenSdk;

use Gpupo\Tests\CommonSdk\Traits\EntityTrait;

abstract class EntityTestCaseAbstract extends TestCaseAbstract
{
    use EntityTrait;

    protected function factoryRequest()
    {
        return $this->getFactory()->createRequest($this->getData('request'));
    }

    protected function factoryOrder()
    {
        return $this->getFactory()->createOrder($this->getData('order'));
    }

    protected function getData($route)
    {
        $dict = [
            'request'   => 'fixtures/payment/request/order/request.json',
            'boleto'    => 'fixtures/payment/request/order/request-boleto.json',
            'order'     => 'fixtures/payment/request/order.json',
        ];

        return $this->getResourceJson($dict[$route]);
    }
}
