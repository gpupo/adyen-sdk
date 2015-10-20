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

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\AdyenSdk\Payment\Request\Request;

abstract class AbstractDecorator extends EntityAbstract implements EntityInterface
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
}
