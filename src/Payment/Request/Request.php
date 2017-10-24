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
            'credit-cart'    => 'CreditCardDecorator',
            'cc'             => 'CreditCardDecorator',
            'capture'        => 'CaptureDecorator',
            'boleto'         => 'BoletoDecorator',
            'refund'         => 'RefundDecorator',
            'cancelOrRefund' => 'CancelOrRefundDecorator',
        ];

        if (!array_key_exists($this->getType(), $dict)) {
            throw new \InvalidArgumentException('Request type ['.$this->getType().']not exist!');
        }

        return $dict[$this->getType()];
    }

    protected function resolveDecorator()
    {
        $className = Factory::PACKAGENAME
            .'Payment\Request\Decorator\\'.$this->getDecoratorName();

        if (!class_exists($className)) {
            throw new \InvalidArgumentException('Request type ['.$className.'] not supported!');
        }

        return $className;
    }

    public function toJson($route = null, $options = 0, $depth = 512)
    {
        $decorator = $this->resolveDecorator();
        $instance = new $decorator();
        $instance->setRequest($this);

        return $instance->toJson();
    }
}
