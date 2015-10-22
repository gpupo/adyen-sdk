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

use Gpupo\AdyenSdk\Factory;
use Gpupo\Tests\CommonSdk\TestCaseAbstract as CommonSdkTestCaseAbstract;

abstract class TestCaseAbstract extends CommonSdkTestCaseAbstract
{
    private $factory;

    public static function getResourcesPath()
    {
        return dirname(dirname(__FILE__)) . '/Resources/';
    }

    public function factoryClient()
    {
        return $this->getFactory()->getClient();
    }

    protected function getOptions()
    {
        return [
        ];
    }

    protected function getFactory()
    {
        if (!$this->factory) {
            $this->factory = Factory::getInstance()->setup($this->getOptions(), $this->getLogger());
        }

        return $this->factory;
    }

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
            'request'           => 'fixtures/payment/request/request.json',
            'boleto'            => 'fixtures/payment/request/request-boleto.json',
            'order'             => 'fixtures/payment/request/order.json',
            'response.boleto'   => 'fixtures/payment/response/boleto.json',
            'response.cc'       => 'fixtures/payment/response/cc.json',
        ];

        return $this->getResourceJson($dict[$route]);
    }
}
