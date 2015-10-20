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

namespace Gpupo\AdyenSdk\Payment\Request\Decorator;

use Gpupo\AdyenSdk\Payment\Request\Request;
use Gpupo\Common\Entity\CollectionAbstract;

abstract class AbstractDecorator extends CollectionAbstract
{
    private $request;

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
            'merchantAccount' => $this->getRequest()->getMerchantAccount(),
            'reference' => 'payment-'.$this->getOrder()->getId(),
            'amount' => [
                'currency'  => 'BRL',
                'value'     => str_replace('.','', strval($this->getOrder()->getAmount())),
            ],
        ];
    }

    protected function getCustomFields()
    {
        return [];
    }
}
