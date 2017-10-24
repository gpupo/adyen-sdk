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
                $key = 'boletobancario.'.$item;
                if (array_key_exists($key, $data['additionalData'])) {
                    $data[$item] = $data['additionalData'][$key];
                    unset($data['additionalData'][$key]);
                }
            }
        }

        return parent::beforeConstruct($data);
    }
}
