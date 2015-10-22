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

namespace Gpupo\AdyenSdk\Payment\Request\Order;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 *
 * @method string getFirstName()    Acesso a firstName
 * @method setFirstName(string $firstName)    Define firstName
 * @method string getLastName()    Acesso a lastName
 * @method setLastName(string $lastName)    Define lastName
 * @method string getIp()    Acesso a ip
 * @method setIp(string $ip)    Define ip
 * @method string getEmail()    Acesso a email
 * @method setEmail(string $email)    Define email
 * @method setSocialSecurityNumber(string $socialSecurityNumber)    Define socialSecurityNumber
 *
 */
class Shopper extends EntityAbstract implements EntityInterface
{
    public function getSchema()
    {
        return [
            'firstName'             => 'string',
            'lastName'              => 'string',
            'ip'                    => 'string',
            'email'                 => 'string',
            'socialSecurityNumber'  => 'string',
        ];
    }

    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
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
        return str_pad($this->get('socialSecurityNumber'), 11, "0", STR_PAD_LEFT);
    }
}
