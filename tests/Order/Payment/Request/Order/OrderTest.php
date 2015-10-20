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

namespace Gpupo\Tests\AdyenSdk\Payment\Request\Order;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\Tests\AdyenSdk\EntityTestCaseAbstract;

class OrderTest extends EntityTestCaseAbstract
{
    const QUALIFIED = '\Gpupo\AdyenSdk\Payment\Request\Order\Order';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'id'                => 'string',
            'shopper'           => 'object',
            'amount'            => 'object',
            'billingAddress'    => 'object',
            'deliveryDate'      => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }
}
