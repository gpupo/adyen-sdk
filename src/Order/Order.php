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

namespace Gpupo\AdyenSdk\Order;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getAmount()    Acesso a amount
 * @method setAmount(string $amount)    Define amount
 * @method string getCurrency()    Acesso a currency
 * @method setCurrency(string $currency)    Define currency
 * @method integer getValue()    Acesso a value
 * @method setValue(integer $value)    Define value
 * @method string getReference()    Acesso a reference
 * @method setReference(string $reference)    Define reference
 * @method string getShopperIP()    Acesso a shopperIP
 * @method setShopperIP(string $shopperIP)    Define shopperIP
 * @method string getShopperEmail()    Acesso a shopperEmail
 * @method setShopperEmail(string $shopperEmail)    Define shopperEmail
 * @method string getShopperReference()    Acesso a shopperReference
 * @method setShopperReference(string $shopperReference)    Define shopperReference
 */
class Order extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'amount'            => 'string',
            'currency'          => 'string',
            'value'             => 'integer',
            'reference'         => 'string',
            'shopperIP'         => 'string',
            'shopperEmail'      => 'string',
            'shopperReference'  => 'string',
        ];
    }
}
