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

namespace Gpupo\AdyenSdk\Payment\Request\Order;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getId()    Acesso a id
 * @method setId(string $id)    Define id
 * @method Gpupo\AdyenSdk\Payment\Request\Order\Shopper getShopper()    Acesso a shopper
 * @method setShopper(Gpupo\AdyenSdk\Payment\Request\Order\Shopper $shopper)    Define shopper
 * @method float getAmount()    Acesso a amount
 * @method setAmount(float $amount)    Define amount
 * @method Gpupo\AdyenSdk\Payment\Request\Order\BillingAddress getBillingAddress()    Acesso a billingAddress
 * @method setBillingAddress(Gpupo\AdyenSdk\Payment\Request\Order\BillingAddress $billingAddress)    Define billingAddress
 * @method Gpupo\AdyenSdk\Payment\Request\Order\ShippingAddress getShippingAddress()    Acesso a shippingAddress
 * @method setShippingAddress(Gpupo\AdyenSdk\Payment\Request\Order\ShippingAddress $shippingAddress)    Define shippingAddress
 * @method integer getInstallments()    Acesso a installments
 * @method setInstallments(integer $installments)    Define installments
 * @method string getDeliveryDate()    Acesso a deliveryDate
 * @method setDeliveryDate(string $deliveryDate)    Define deliveryDate
 * @method string getCreatedAt()    Acesso a createdAt
 * @method setCreatedAt(string $createdAt)    Define createdAt
 */
class Order extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'id'                => 'string',
            'shopper'           => 'object',
            'amount'            => 'number',
            'billingAddress'    => 'object',
            'shippingAddress'   => 'object',
            'installments'      => 'integer',
            'deliveryDate'      => 'string',
            'createdAt'         => 'string',
        ];
    }

    public function getAmount()
    {
        return number_format($this->get('amount'), 2);
    }
}
