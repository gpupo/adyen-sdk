[![Build Status](https://secure.travis-ci.org/gpupo/adyen-sdk.png?branch=master)](http://travis-ci.org/gpupo/adyen-sdk)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gpupo/adyen-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gpupo/adyen-sdk/?branch=master)
[![Code Climate](https://codeclimate.com/github/gpupo/adyen-sdk/badges/gpa.svg)](https://codeclimate.com/github/gpupo/adyen-sdk)
[![Test Coverage](https://codeclimate.com/github/gpupo/adyen-sdk/badges/coverage.svg)](https://codeclimate.com/github/gpupo/adyen-sdk/coverage)
[![Paypal Donations](https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EK6F2WRKG7GNN&item_name=adyen-sdk)

# adyen-sdk

SDK Não Oficial para integração a partir de aplicações PHP com as APIs REST da Adyen

## Requisitos

* PHP >= *5.4*
* [curl extension](http://php.net/manual/en/intro.curl.php)

---

## Instalação

Adicione o pacote [adyen-sdk](https://packagist.org/packages/gpupo/adyen-sdk) ao seu projeto utilizando [composer](http://getcomposer.org):

    composer require gpupo/adyen-sdk

---

# Uso

## Setup Inicial

```PHP
//...
use Gpupo\AdyenSdk\Factory;

$adyenSdk = Factory::getInstance()->setup([
    'client_user'       => 'foo',
    'client_password'   => 'bar',
    'version'           => 'test'
]);

```

Parâmetro | Descrição | Valores possíveis
----------|-----------|------------------
``client_user``|Usuário webservice| string
``client_password``|Senha do usuário webservice| string
``merchant_account``|Identificação da conta na Adyen| string
``version``|Identificação do Ambiente| test, live (produção)
``registerPath``|Quando informado, registra no diretório informado, os dados de cada requisição executada

#### Registro (log)

``` PHP
//...
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
//..
$logger = new Logger('foo');
$logger->pushHandler(new StreamHandler('Resources/logs/main.log', Logger::DEBUG));
$adyenSdk->setLogger($logger);

```
## Transações

Nos exemplos abaixo considere que ``$data`` possui [esta estrutura](https://github.com/gpupo/adyen-sdk/blob/master/Resources/fixtures/payment/request/request.json)

#### Criação de uma nova transação com cartão de crédito

``` PHP
//...
$request = $adyenSdk->createRequest($data);
$request->setEncryptedData($hash);
$manager = $adyenSdk->factoryManager('request');
$response = $manager->submit($request);

```

#### Criação de uma nova transação com boleto bancário

``` PHP
//...
$request->setType('boleto');
$response = $manager->submit($request); //acesso à url do boleto e outras informações
$response->getBarCodeReference(); // Linha digitável
$response->getExpirationDate(); // Data de Vencimento
$response->getUrl(); // Url Do Boleto
$response->getData(); // Parâmetro usado para compor a url para o boleto

```

---

## Propriedades dos objetos

A lista abaixo é gerada automaticamente a partir da saída da execução dos testes unitários:

<!--
phpunit --testdox | grep -vi php |  sed "s/.*\[*]/-/" | sed 's/.*Gpupo.*/&\'$'\n/g' | sed 's/.*Gpupo.*/&\'$'\n/g' | sed 's/Gpupo\\Tests\\AdyenSdk\\/### /g' | sed '/./,/^$/!d' >> README.md
-->
### Client\Client

- Acesso ao client
- Sucesso ao definir options
- Gerencia uri de recurso

### Factory

- Centraliza criacao de objetos

### Payment\Request\Order\Order

- Possui método ``getId()`` para acessar Id
- Possui método ``setId()`` que define Id
- Possui método ``getShopper()`` para acessar Shopper
- Possui método ``setShopper()`` que define Shopper
- Possui método ``getAmount()`` e ``setAmount()`` para acessar e definir Amount
- Possui método ``getBillingAddress()`` para acessar BillingAddress
- Possui método ``setBillingAddress()`` que define BillingAddress
- Possui método ``getShippingAddress()`` para acessar ShippingAddress
- Possui método ``setShippingAddress()`` que define ShippingAddress
- Possui método ``getInstallments()`` para acessar Installments
- Possui método ``setInstallments()`` que define Installments
- Possui método ``getDeliveryDate()`` para acessar DeliveryDate
- Possui método ``setDeliveryDate()`` que define DeliveryDate
- Possui método ``getCreatedAt()`` para acessar CreatedAt
- Possui método ``setCreatedAt()`` que define CreatedAt
- Entidade é uma Coleção

### Payment\Request\Request

- Possui método ``getOrder()`` para acessar Order
- Possui método ``setOrder()`` que define Order
- Possui método ``getType()`` para acessar Type
- Possui método ``setType()`` que define Type
- Possui método ``getEncryptedData()`` para acessar EncryptedData
- Possui método ``setEncryptedData()`` que define EncryptedData
- Entidade é uma Coleção

