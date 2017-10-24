<?php

/*
 * This file is part of gpupo/adyen-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 */

namespace Gpupo\Tests\AdyenSdk;

use Gpupo\AdyenSdk\Factory;
use Gpupo\Tests\CommonSdk\TestCaseAbstract as CommonSdkTestCaseAbstract;

abstract class TestCaseAbstract extends CommonSdkTestCaseAbstract
{
    private $factory;

    public static function getResourcesPath()
    {
        return dirname(dirname(__FILE__)).'/Resources/';
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

    protected function factoryRequest($route = 'request')
    {
        return $this->getFactory()->createRequest($this->getData($route));
    }

    protected function factoryOrder()
    {
        return $this->getFactory()->createOrder($this->getData('order'));
    }

    protected function getData($route)
    {
        $dict = [
            'request'              => 'fixtures/payment/request/request.json',
            'boleto'               => 'fixtures/payment/request/request-boleto.json',
            'order'                => 'fixtures/payment/request/order.json',
            'capture'              => 'fixtures/payment/request/request.json',
            'response.boleto'      => 'fixtures/payment/response/boleto.json',
            'response.cc'          => 'fixtures/payment/response/cc.json',
            'response.capture'     => 'fixtures/payment/response/capture.json',
            'response.refund'      => 'fixtures/payment/response/refund.json',
            'response.problematic' => 'fixtures/payment/response/problematic.json',
        ];

        if (!array_key_exists($route, $dict)) {
            throw new \Exception('Mapeamento inexistente');
        }

        return $this->getResourceJson($dict[$route]);
    }

    protected function getRequestManager($fixture = null, $statusCode = 200)
    {
        $manager = $this->getFactory()->factoryManager('request');

        if (!empty($fixture)) {
            $manager->setDryRun($this->factoryResponseFromFixture('fixtures/payment/response/'.$fixture, $statusCode));
        }

        return $manager;
    }
}
