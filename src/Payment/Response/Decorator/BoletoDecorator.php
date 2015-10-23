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

namespace Gpupo\AdyenSdk\Payment\Response\Decorator;

use Gpupo\AdyenSdk\Payment\Response\SuccessInterface;

class BoletoDecorator extends AbstractDecorator implements SuccessInterface
{
    protected function getBoletoFields()
    {
        return [
            'barCodeReference',
            'data',
            'dueDate',
            'url',
            'expirationDate',
        ];
    }

    public function getSchema()
    {
        $list = parent::getSchema();

        foreach ($this->getBoletoFields() as $item) {
            $list[$item] = 'string';
        }

        return $list;
    }

    protected function beforeConstruct($data = null)
    {
        if (array_key_exists('additionalData', $data) && is_array($data['additionalData'])) {
            foreach ($this->getBoletoFields() as $item) {
                $key = 'boletobancario.' . $item;
                if (array_key_exists($key, $data['additionalData'])) {
                    $data[$item] = $data['additionalData'][$key];
                    unset($data['additionalData'][$key]);
                }
            }
        }

        return $data;
    }
}
