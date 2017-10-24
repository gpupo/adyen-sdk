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

namespace Gpupo\AdyenSdk;

use Gpupo\AdyenSdk\Client\Client;
use Gpupo\CommonSdk\FactoryAbstract;

class Factory extends FactoryAbstract
{
    const PACKAGENAME = '\Gpupo\AdyenSdk\\';

    public function setClient(array $clientOptions = [])
    {
        $this->client = new Client($clientOptions, $this->logger);
    }

    public function getNamespace()
    {
        return self::PACKAGENAME;
    }

    protected function getSchema($namespace = null)
    {
        return [
            'order' => [
                'class' => $namespace.'Payment\Request\Order\Order',
            ],
            'request' => [
                'class'   => $namespace.'Payment\Request\Request',
                'manager' => $namespace.'Payment\Request\Manager',
            ],
        ];
    }
}
