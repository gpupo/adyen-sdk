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

namespace Gpupo\Tests\AdyenSdk\Order;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\Tests\AdyenSdk\EntityTestCaseAbstract;

class OrderTest extends EntityTestCaseAbstract
{
    const QUALIFIED = '\Gpupo\AdyenSdk\Order\Order';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'amount'           => 'string',
            'currency'         => 'string',
            'value'            => 100,
            'reference'        => 'string',
            'shopperIP'        => 'string',
            'shopperEmail'     => 'string',
            'shopperReference' => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Possui método ``getAmount()`` para acessar Amount
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterAmount(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('amount', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setAmount()`` que define Amount
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterAmount(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('amount', 'string', $object);
    }

    /**
     * @testdox Possui método ``getCurrency()`` para acessar Currency
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterCurrency(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('currency', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setCurrency()`` que define Currency
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterCurrency(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('currency', 'string', $object);
    }

    /**
     * @testdox Possui método ``getValue()`` para acessar Value
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterValue(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('value', 'integer', $object, $expected);
    }

    /**
     * @testdox Possui método ``setValue()`` que define Value
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterValue(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('value', 'integer', $object);
    }

    /**
     * @testdox Possui método ``getReference()`` para acessar Reference
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterReference(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('reference', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setReference()`` que define Reference
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterReference(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('reference', 'string', $object);
    }

    /**
     * @testdox Possui método ``getShopperIP()`` para acessar ShopperIP
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterShopperIP(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('shopperIP', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setShopperIP()`` que define ShopperIP
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterShopperIP(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('shopperIP', 'string', $object);
    }

    /**
     * @testdox Possui método ``getShopperEmail()`` para acessar ShopperEmail
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterShopperEmail(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('shopperEmail', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setShopperEmail()`` que define ShopperEmail
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterShopperEmail(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('shopperEmail', 'string', $object);
    }

    /**
     * @testdox Possui método ``getShopperReference()`` para acessar ShopperReference
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterShopperReference(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('shopperReference', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setShopperReference()`` que define ShopperReference
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterShopperReference(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('shopperReference', 'string', $object);
    }
}
