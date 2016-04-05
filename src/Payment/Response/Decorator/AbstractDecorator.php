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

namespace Gpupo\AdyenSdk\Payment\Response\Decorator;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

abstract class AbstractDecorator extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'code'           => 'number',
            'status'         => 'number',
            'pspReference'   => 'string',
            'resultCode'     => 'string',
            'authCode'       => 'string',
            'response'       => 'string',
            'additionaldata' => 'array',
        ];
    }

    public function getCode()
    {
        return intval($this->get('code'));
    }

    public function getStatus()
    {
        return intval($this->get('status'));
    }
}
