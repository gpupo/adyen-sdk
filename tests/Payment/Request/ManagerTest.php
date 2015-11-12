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

namespace Gpupo\Tests\AdyenSdk\Payment\Request;

use Gpupo\Tests\AdyenSdk\TestCaseAbstract;

class ManagerTest extends TestCaseAbstract
{
    /**
     * @testdox É o administrador de requisições
     * @test
     */
    public function instance()
    {
        $manager = $this->getRequestManager();
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Payment\Request\Manager', $manager);

        return $manager;
    }

    /**
     * @testdox Executa a requisição de um novo boleto e devolve objeto específico
     * @test
     */
    public function requestBoleto()
    {
        $manager = $this->getRequestManager('boleto.json');
        $request = $this->factoryRequest('boleto');
        $response = $manager->submit($request);
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Payment\Response\Decorator\AbstractDecorator', $response);
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Payment\Response\SuccessInterface', $response);
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Payment\Response\Decorator\BoletoDecorator', $response);
    }

    /**
     * @testdox Executa a autorização de um pagamento com cartão de crédito e devolve objeto específico
     * @test
     */
    public function requestCreditCard()
    {
        $manager = $this->getRequestManager('cc.json');
        $request = $this->factoryRequest();
        $response = $manager->submit($request);
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Payment\Response\Decorator\AbstractDecorator', $response);
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Payment\Response\SuccessInterface', $response);
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Payment\Response\Decorator\CreditCardDecorator', $response);
    }

    /**
     * @testdox Em requisições mal sucedidas entrega objeto problemático
     * @test
     */
    public function requestProblematic()
    {
        $manager = $this->getRequestManager('problematic.json', 422);
        $request = $this->factoryRequest();
        $response = $manager->submit($request);
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Payment\Response\Decorator\AbstractDecorator', $response);
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Payment\Response\FailInterface', $response);
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Payment\Response\Decorator\ProblematicDecorator', $response);
    }


    /**
     * @testdox Executa a requisição de uma captura
     * @test
     */
    public function requestCapture()
    {
        $manager = $this->getRequestManager('capture.json');
        $request = $this->factoryRequest();
        $response = $manager->capture($request);
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Payment\Response\Decorator\AbstractDecorator', $response);
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Payment\Response\SuccessInterface', $response);
        $this->assertInstanceOf('\Gpupo\AdyenSdk\Payment\Response\Decorator\CaptureDecorator', $response);
    }


}
