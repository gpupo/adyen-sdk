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

use Gpupo\Common\Interfaces\OptionsInterface;
use Gpupo\Common\Traits\OptionsTrait;
use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Entity\ManagerAbstract;
use Gpupo\CommonSdk\Response;
use Gpupo\AdyenSdk\Payment\Response\ExceptionResponse;
use Gpupo\AdyenSdk\Factory;

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
    ];

    public function submit(Request $request)
    {
        $request->setMerchantAccount($this->getOptions()->get('merchant_account'));

        try {
            $response =  $this->execute($this->factoryMap('submit'), $request->toJson());

            return $this->processExecute($request, $response);
        } catch (\Exception $exception) {
            return new ExceptionResponse($exception);
        }

    }

    protected function processExecute(Request $request, Response $response)
    {
        $decorator = $this->resolveDecorator($request);
        $data = $response->getData()->toArray();
        $instance = new $decorator($data);
        $instance->setCode($response->getHttpStatusCode());

        return $instance;
    }

    protected function resolveDecorator(Request $request)
    {
        $className = Factory::PACKAGENAME . 'Payment\Response\Decorator\\' . $request->getDecoratorName();

        if (!class_exists($className)) {
            throw new \InvalidArgumentException('Response type [' . $type . '] not supported!');
        }

        return $className;
    }
}
