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

use Gpupo\AdyenSdk\Payment\Request\Decorator\BoletoDecorator;
use Gpupo\AdyenSdk\Payment\Request\Decorator\CreditCardDecorator;
use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Request extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'order'             => 'object',
            'type'              => 'string',
            'encryptedData'     => 'string',
            'merchantAccount'   => 'string',
        ];
    }

    protected function resolveDecorator()
    {
        $dict = [
            'credit-cart' => 'CreditCardDecorator',
            'cc'          => 'CreditCardDecorator',
            'boleto'      => 'BoletoDecorator',
        ];

        $type = strtolower($this->getType());

        if (!array_key_exists($type, $dict)) {
            throw new \InvalidArgumentException('Request type [' . $type . ']not exist!');
        }

        return $dict[$type];
    }

    public function toJson($route = null)
    {
        $decorator = $this->resolveDecorator();
        $instance = new $decorator();
        $instance->setRequest($this);

        return $instance->toJson();
    }
}
