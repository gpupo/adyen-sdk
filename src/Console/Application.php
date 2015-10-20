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

namespace Gpupo\AdyenSdk\Console;

use Gpupo\AdyenSdk\Factory;
use Gpupo\CommonSdk\Console\AbstractApplication;

class Application extends AbstractApplication
{
    protected $commonParameters = [
        [
            'key'   => 'client_user',
        ],
        [
            'key'   => 'client_password',
        ],
        [
            'key'   => 'merchant_account',
        ],
        [
            'key'       => 'env',
            'options'   => ['test', 'live'],
            'default'   => 'test',
            'name'      => 'Version',
        ],
        [
            'key'       => 'registerPath',
            'default'   => false,
        ],
    ];

    public function factorySdk(array $options)
    {
        $options['version'] = $options['env'];
        $instance = Factory::getInstance();

        return  $instance->setup($options, $this->factoryLogger());
    }
}
