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
use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method Gpupo\AdyenSdk\Payment\Request\Order\Order getOrder()    Acesso a order
 * @method setOrder(Gpupo\AdyenSdk\Payment\Request\Order\Order $order)    Define order
 * @method string getType()    Acesso a type
 * @method setType(string $type)    Define type
 * @method string getEncryptedData()    Acesso a encryptedData
 * @method setEncryptedData(string $encryptedData)    Define encryptedData
 * @method string getMerchantAccount()    Acesso a merchantAccount
 * @method setMerchantAccount(string $merchantAccount)    Define merchantAccount
 */
class Request extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'order'           => 'object',
            'type'            => 'string',
            'encryptedData'   => 'string',
            'merchantAccount' => 'string',
        ];
    }

    public function getDecoratorName()
    {
        $dict = [
            'credit-cart' => 'CreditCardDecorator',
            'cc'          => 'CreditCardDecorator',
            'capture'     => 'CaptureDecorator',
            'boleto'      => 'BoletoDecorator',
        ];

        $type = strtolower($this->getType());

        if ( ! array_key_exists($type, $dict)) {
            throw new \InvalidArgumentException('Request type [' . $type . ']not exist!');
        }

        return $dict[$type];
    }

    protected function resolveDecorator()
    {
        $className = Factory::PACKAGENAME
            . 'Payment\Request\Decorator\\' . $this->getDecoratorName();

        if ( ! class_exists($className)) {
            throw new \InvalidArgumentException('Request type [' . $className . '] not supported!');
        }

        return $className;
    }

    public function toJson($route = null)
    {
        $decorator = $this->resolveDecorator();
        $instance = new $decorator();
        $instance->setRequest($this);

        return $instance->toJson();
    }
}
