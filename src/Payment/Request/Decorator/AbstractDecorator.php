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

namespace Gpupo\AdyenSdk\Payment\Request\Decorator;

use Gpupo\AdyenSdk\Payment\Request\Request;
use Gpupo\Common\Entity\CollectionAbstract;

abstract class AbstractDecorator extends CollectionAbstract
{
    private $request;

    protected $name = 'generic';

    protected function factoryReference()
    {
        return 'payment-'.$this->name.$this->getOrder()->getId();
    }

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    protected function getRequest()
    {
        if (!$this->request instanceof Request) {
            throw new \InvalidArgumentException('Request ausente!');
        }

        return $this->request;
    }

    protected function getOrder()
    {
        return $this->getRequest()->getOrder();
    }

    public function toArray()
    {
        return array_merge($this->getGenericFields(), $this->getCustomFields());
    }

    protected function getGenericFields()
    {
        return [
            'merchantAccount'        => $this->getRequest()->getMerchantAccount(),
            'reference'              => $this->factoryReference(),
            'amount'                 => ['currency' => 'BRL', 'value' => $this->getOrder()->getAmountInt()],
            'shopperEmail'           => $this->getOrder()->getShopper()->getEmail(),
            'shopperIP'              => $this->getOrder()->getShopper()->getIp(),
            'merchantOrderReference' => 'payment-'.$this->getOrder()->getId(),
        ];
    }

    protected function getCustomFields()
    {
        return [];
    }
}
