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

namespace Gpupo\AdyenSdk\Client;

use Gpupo\CommonSdk\Client\ClientAbstract;
use Gpupo\CommonSdk\Client\ClientInterface;

class Client extends ClientAbstract implements ClientInterface
{
    public function getDefaultOptions()
    {
        return [
            'client_user'      => false,
            'client_password'  => false,
            'base_url'         => '{PROTOCOL}://pal-{VERSION}.adyen.com/pal/servlet/Payment/v12',
            'protocol'         => 'https',
            'version'          => 'test',
            'verbose'          => false,
            'sslVersion'       => 'SecureTransport',
            'cacheTTL'         => 3600,
            'sslVerifyPeer'    => true,
        ];
    }

    protected function renderAuthorization()
    {
        foreach (['client_user', 'client_password'] as $key) {
            $value = $this->getOptions()->get($key);
            if (empty($value)) {
                throw new \InvalidArgumentException('[' . $key . '] ausente!');
            }
        }

        return 'Authorization: Basic '
            .base64_encode($this->getOptions()->get('client_user').':'
            .$this->getOptions()->get('client_password'));
    }
}
