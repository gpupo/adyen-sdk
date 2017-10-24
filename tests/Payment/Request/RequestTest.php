<?php

/*
 * This file is part of gpupo/adyen-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\Tests\AdyenSdk\Payment\Request;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\Tests\AdyenSdk\EntityTestCaseAbstract;

class RequestTest extends EntityTestCaseAbstract
{
    const QUALIFIED = '\Gpupo\AdyenSdk\Payment\Request\Request';

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    public function dataProviderObject()
    {
        $expected = [
            'order'         => 'object',
            'type'          => 'string',
            'encryptedData' => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Possui método ``getOrder()`` para acessar Order
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterOrder(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('order', 'object', $object, $expected);
    }

    /**
     * @testdox Possui método ``setOrder()`` que define Order
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterOrder(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('order', 'object', $object);
    }

    /**
     * @testdox Possui método ``getType()`` para acessar Type
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterType(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('type', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setType()`` que define Type
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterType(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('type', 'string', $object);
    }

    /**
     * @testdox Possui método ``getEncryptedData()`` para acessar EncryptedData
     * @dataProvider dataProviderObject
     * @test
     */
    public function getterEncryptedData(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaGetter('encryptedData', 'string', $object, $expected);
    }

    /**
     * @testdox Possui método ``setEncryptedData()`` que define EncryptedData
     * @dataProvider dataProviderObject
     * @test
     */
    public function setterEncryptedData(EntityInterface $object, $expected = null)
    {
        $this->assertSchemaSetter('encryptedData', 'string', $object);
    }
}
