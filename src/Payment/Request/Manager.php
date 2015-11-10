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
        'submit'    => ['POST', '/authorise'],
        'capture'   => ['POST', '/capture'],
        'refund'    => ['POST', '/refund'],
        'cancel'    => ['POST', '/cancel'],
    ];

    protected function preExecute(Request $request)
    {
        $request->setMerchantAccount($this->getOptions()->get('merchant_account'));

        return $request;
    }

    protected function call(Request $request, $route)
    {
        $response = $this->execute($this->factoryMap($route, $request->toJson()));

        return $this->processExecute($request, $response);
    }

    public function blow(Request $request, $route)
    {
        $this->preExecute($request);

        try {
            return $this->callExecute($request, $route);
        } catch (\Exception $exception) {
            return new ErrorDecorator($exception);
        }
    }

    public function submit(Request $request)
    {
        return $this->blow($request, 'submit');
    }

    /**
     * @todo Implement
     */
    public function capture(Request $request)
    {
        return $this->blow($request, 'capture');
    }

    /**
     * @todo Implement
     */
    public function refund(Request $request)
    {
        return $this->blow($request, 'refund');
    }

    /**
     * @todo Implement
     */
    public function cancel(Request $request)
    {
        return $this->blow($request, 'cancel');
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
        return Factory::PACKAGENAME . 'Payment\Response\Decorator\\' . $name;
    }

    protected function resolveDecorator(Request $request)
    {
        $className = $this->getFullyQualifiedDecoratorName($request->getDecoratorName());

        if (!class_exists($className)) {
            throw new \InvalidArgumentException('Response type [' . $type . '] not supported!');
        }

        return $className;
    }
}
