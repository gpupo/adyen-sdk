<?php

/*
 * This file is part of gpupo/adyen-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\AdyenSdk\Payment\Request;

use Gpupo\AdyenSdk\Factory;
use Gpupo\AdyenSdk\Payment\Response\Decorator\ErrorDecorator;
use Gpupo\AdyenSdk\Payment\Response\Decorator\ProblematicDecorator;
use Gpupo\Common\Interfaces\OptionsInterface;
use Gpupo\Common\Traits\OptionsTrait;
use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Entity\ManagerAbstract;
use Gpupo\CommonSdk\Response;

/**
 * Gerenciamento de Transações Adyen.
 */
class Manager extends ManagerAbstract implements OptionsInterface
{
    use OptionsTrait;

    /**
     * @internal
     */
    public function update(EntityInterface $entity, EntityInterface $existent)
    {
    }

    protected $entity = 'Request';

    protected $maps = [
        'submit'         => ['POST', '/authorise'],
        'capture'        => ['POST', '/capture'],
        'refund'         => ['POST', '/refund'],
        'cancelOrRefund' => ['POST', '/cancelOrRefund'],
    ];

    protected function preExecute(Request $request)
    {
        $request->setMerchantAccount($this->getOptions()->get('merchant_account'));

        return $request;
    }

    protected function call(Request $request, $route)
    {
        $response = $this->execute($this->factoryMap($route), $request->toJson());

        return $this->processExecute($request, $response);
    }

    public function blow(Request $request, $route)
    {
        $request = $this->preExecute($request);
        try {
            return $this->call($request, $route);
        } catch (\Exception $exception) {
            return new ErrorDecorator($exception);
        }
    }

    public function submit(Request $request)
    {
        return $this->blow($request, 'submit');
    }

    public function capture(Request $request)
    {
        $request->setType('capture');

        return $this->blow($request, 'capture');
    }

    public function refund(Request $request, $modificationValue)
    {
        $request->setType('refund');
        $request->getOrder()->setModificationValue($modificationValue);

        return $this->blow($request, 'refund');
    }

    public function cancelOrRefund(Request $request)
    {
        $request->setType('cancelOrRefund');

        return $this->blow($request, 'cancelOrRefund');
    }

    protected function processExecute(Request $request, Response $response)
    {
        if (300 > $response->getHttpStatusCode()) {
            $decorator = $this->resolveDecorator($request);
        } else {
            $decorator = $this->getFullyQualifiedDecoratorName('ProblematicDecorator');
        }

        $data = $response->getData()->toArray();
        $instance = new $decorator($data);
        $instance->setCode($response->getHttpStatusCode());

        return $instance;
    }

    protected function getFullyQualifiedDecoratorName($name)
    {
        return Factory::PACKAGENAME.'Payment\Response\Decorator\\'.$name;
    }

    protected function resolveDecorator(Request $request)
    {
        $className = $this->getFullyQualifiedDecoratorName($request->getDecoratorName());

        if (!class_exists($className)) {
            throw new \InvalidArgumentException('Response type ['.$request->getType().'] not supported!');
        }

        return $className;
    }
}
