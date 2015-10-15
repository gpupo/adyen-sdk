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

namespace Gpupo\AdyenSdk\Transaction;

use Gpupo\AdyenSdk\ManagerAbstract;

/**
 * Gerenciamento de Transações Adyen.
 */
class Manager extends ManagerAbstract
{
    protected $entity = 'Payment';

    protected $maps = [
        'authorise'    => ['POST', '/authorise'],
    ];

    public function authorise(AbstractRequest $request)
    {
        $status = $order->getStatus();

        return $this->execute($this->factoryMap('authorise'), $request->toJson());
    }

}
