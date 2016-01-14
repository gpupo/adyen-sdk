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

namespace Gpupo\Tests\AdyenSdk;

use Gpupo\AdyenSdk\Factory;
use Gpupo\Tests\CommonSdk\FactoryTestAbstract;

class FactoryTest extends FactoryTestAbstract
{
    public $namespace = '\Gpupo\AdyenSdk\\';

    public function getFactory()
    {
        return Factory::getInstance();
    }

    public function dataProviderObjetos()
    {
        return [
            [$this->namespace . 'Payment\Request\Order\Order', 'order', null],
            [$this->namespace . 'Payment\Request\Request', 'request', null],
        ];
    }
}
