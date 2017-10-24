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
 * For more information, see <https://opensource.gpupo.com/>.
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
        $this->assertSame(
            'https://pal-test.adyen.com/pal/servlet/Payment/v12/authorise',
            $client->getResourceUri('/authorise')
        );
    }
}
