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

namespace Gpupo\AdyenSdk\Client;

use Gpupo\CommonSdk\Client\ClientAbstract;
use Gpupo\CommonSdk\Client\ClientInterface;

class Client extends ClientAbstract implements ClientInterface
{
    public function getDefaultOptions()
    {
        return [
            'client_user'     => false,
            'client_password' => false,
            'base_url'        => '{PROTOCOL}://{VERSION}/pal/servlet/Payment/v12',
            'protocol'        => 'https',
            'version'         => 'pal-test.adyen.com',
            'verbose'         => false,
            'sslVersion'      => 'SecureTransport',
            'cacheTTL'        => 3600,
            'sslVerifyPeer'   => true,
        ];
    }

    protected function renderAuthorization()
    {
        foreach (['client_user', 'client_password'] as $key) {
            $value = $this->getOptions()->get($key);
            if (empty($value)) {
                throw new \InvalidArgumentException('['.$key.'] ausente!');
            }
        }

        return 'Authorization: Basic '
            .base64_encode($this->getOptions()->get('client_user').':'
            .$this->getOptions()->get('client_password'));
    }
}
