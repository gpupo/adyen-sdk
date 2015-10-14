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

namespace Gpupo\Tests\AdyenSdk\Client;

use Gpupo\Tests\AdyenSdk\TestCaseAbstract;

class ClientTest extends TestCaseAbstract
{
    public function testAcessoAoClient()
    {
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Client\Client', $this->factoryClient());
    }

    public function testSucessoAoDefinirOptions()
    {
        $client = $this->factoryClient();
        $this->assertInstanceOf('\Gpupo\CommonSdk\Client\ClientInterface', $client);

        return $client;
    }

    /**
     * @depends testSucessoAoDefinirOptions
     */
    public function testGerenciaUriDeRecurso($client)
    {
        $this->assertEquals('https://pal-test.adyen.com/pal/servlet/Payment/v12/authorise',
            $client->getResourceUri('/authorise'));
    }
}
