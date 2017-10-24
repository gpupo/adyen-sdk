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

namespace Gpupo\AdyenSdk\Payment\Request\Order;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * @method string getFirstName()    Acesso a firstName
 * @method setFirstName(string $firstName)    Define firstName
 * @method string getLastName()    Acesso a lastName
 * @method setLastName(string $lastName)    Define lastName
 * @method string getIp()    Acesso a ip
 * @method setIp(string $ip)    Define ip
 * @method string getEmail()    Acesso a email
 * @method setEmail(string $email)    Define email
 * @method setSocialSecurityNumber(string $socialSecurityNumber)    Define socialSecurityNumber
 */
class Shopper extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'firstName'            => 'string',
            'lastName'             => 'string',
            'ip'                   => 'string',
            'email'                => 'string',
            'socialSecurityNumber' => 'string',
        ];
    }

    public function getFullName()
    {
        return $this->getFirstName().' '.$this->getLastName();
    }

    public function getArrayName()
    {
        return [
            'firstName' => $this->getFirstName(),
            'lastName'  => $this->getLastName(),
        ];
    }

    public function getSocialSecurityNumber()
    {
        return str_pad($this->get('socialSecurityNumber'), 11, '0', STR_PAD_LEFT);
    }
}
