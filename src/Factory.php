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

namespace Gpupo\AdyenSdk;

use Gpupo\AdyenSdk\Client\Client;
use Gpupo\CommonSdk\FactoryAbstract;

class Factory extends FactoryAbstract
{
    public function setClient(array $clientOptions = [])
    {
        $this->client = new Client($clientOptions, $this->logger);
    }

    public function getNamespace()
    {
        return '\Gpupo\AdyenSdk\\';
    }

    protected function getSchema($namespace = null)
    {
        return [
            'order' => [
                'class'     => $namespace . 'Order\Order',
            ],
            'authorise' => [
                'class'     => $namespace . 'Payment\Authorise',
                'manager'   => $namespace . 'Payment\Manager',
            ],
        ];
    }
}
