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

class ProblematicDecorator extends ErrorDecorator
{
    public function getSchema()
    {
        $list = parent::getSchema();
        return array_merge($list,[
            'refusalReason' => 'string',
            'errorCode'     => 'string',
        ]);
    }
}
