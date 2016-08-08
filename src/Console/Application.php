<?php

/*
 * This file is part of gpupo/adyen-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\AdyenSdk\Console;

use Gpupo\AdyenSdk\Factory;
use Gpupo\CommonSdk\Console\AbstractApplication;

class Application extends AbstractApplication
{
    protected $commonParameters = [
        [
            'key' => 'client_user',
        ],
        [
            'key' => 'client_password',
        ],
        [
            'key' => 'merchant_account',
        ],
        [
            'key'     => 'env',
            'options' => ['test', 'live'],
            'default' => 'test',
            'name'    => 'Version',
        ],
        [
            'key'     => 'registerPath',
            'default' => false,
        ],
    ];

    public function factorySdk(array $options)
    {
        $options['version'] = $options['env'];
        $instance = Factory::getInstance();

        return  $instance->setup($options, $this->factoryLogger());
    }
}
