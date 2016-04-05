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
        return $this->dataProviderEntitySchema(self::QUALIFIED, $this->getData('order'));
    }

    /**
     * @testdox Possui método ``getId()`` para acessar Id
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterId(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('id', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setId()`` que define Id
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterId(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('id', 'string', $object);
    }

    /**
     * @testdox Possui método ``getShopper()`` para acessar Shopper
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterShopper(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('shopper', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método ``setShopper()`` que define Shopper
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterShopper(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('shopper', 'object', $object);
    }

    /**
     * @testdox Possui método ``getAmount()`` e ``setAmount()`` para acessar e definir Amount
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterAmount(EntityInterface $object)
    {
        foreach ([128, 44.5, 12085342.55, 129.01] as $num) {
            $object->setAmount($num);
            $out = $object->getAmount();
            $this->assertEquals($num, $out);
        }
    }

    /**
     * @testdox Possui método ``getAmountInt()`` para acessar e definir Amount em formato "minor units"
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterAmountInt(EntityInterface $object)
    {
        foreach ([128, 129.01, 88.1, 457883.99] as $num) {
            $object->setAmount($num);
            $out = $object->getAmountInt();
            $this->assertEquals($num * 100, $out);
        }
    }

    /**
     * @testdox Possui método ``getBillingAddress()`` para acessar BillingAddress
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterBillingAddress(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('billingAddress', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método ``setBillingAddress()`` que define BillingAddress
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterBillingAddress(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('billingAddress', 'object', $object);
    }

    /**
     * @testdox Possui método ``getShippingAddress()`` para acessar ShippingAddress
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterShippingAddress(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('shippingAddress', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método ``setShippingAddress()`` que define ShippingAddress
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterShippingAddress(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('shippingAddress', 'object', $object);
    }

    /**
     * @testdox Possui método ``getInstallments()`` para acessar Installments
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterInstallments(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('installments', 'integer', $object, $expected);
    }

    /**
     * @testdox Possui método ``setInstallments()`` que define Installments
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterInstallments(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('installments', 'integer', $object);
    }

    /**
     * @testdox Possui método ``getDeliveryDate()`` para acessar DeliveryDate
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterDeliveryDate(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('deliveryDate', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setDeliveryDate()`` que define DeliveryDate
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterDeliveryDate(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('deliveryDate', 'string', $object);
    }

    /**
     * @testdox Possui método ``getCreatedAt()`` para acessar CreatedAt
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterCreatedAt(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('createdAt', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setCreatedAt()`` que define CreatedAt
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterCreatedAt(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('createdAt', 'string', $object);
    }
}
