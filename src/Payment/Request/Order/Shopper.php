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

class Shopper extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'firstName'             => 'string',
            'lastName'              => 'string',
            'ip'                    => 'string',
            'email'                 => 'string',
            'socialSecurityNumber'  => 'integer',
        ];
    }
}
