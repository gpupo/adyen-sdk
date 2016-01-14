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

class ShopperTest extends EntityTestCaseAbstract
{
    const QUALIFIED = '\Gpupo\AdyenSdk\Payment\Request\Order\Shopper';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        return $this->dataProviderEntitySchema(self::QUALIFIED, $this->getData('order')['shopper']);
    }

    /**
     * @testdox Possui método ``getFirstName()`` para acessar FirstName
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterFirstName(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('firstName', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setFirstName()`` que define FirstName
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterFirstName(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('firstName', 'string', $object);
    }

    /**
     * @testdox Possui método ``getLastName()`` para acessar LastName
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterLastName(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('lastName', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setLastName()`` que define LastName
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterLastName(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('lastName', 'string', $object);
    }

    /**
     * @testdox Possui método ``getIp()`` para acessar Ip
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterIp(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('ip', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setIp()`` que define Ip
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterIp(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('ip', 'string', $object);
    }

    /**
     * @testdox Possui método ``getEmail()`` para acessar Email
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterEmail(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('email', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setEmail()`` que define Email
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterEmail(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('email', 'string', $object);
    }

    /**
     * @testdox Possui método ``getSocialSecurityNumber()`` para acessar SocialSecurityNumber informado com Left Pad (zeros à esquerda)
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterSocialSecurityNumber(EntityInterface $object)
    {
        $this->assertSame(11, strlen($object->getSocialSecurityNumber()));
    }

    /**
     * @testdox Possui método ``setSocialSecurityNumber()`` que define SocialSecurityNumber
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterSocialSecurityNumber(EntityInterface $object)
    {
        $object->setSocialSecurityNumber('12345678911');
        $this->assertSame('12345678911', $object->getSocialSecurityNumber());
    }
}
