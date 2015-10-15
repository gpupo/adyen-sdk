[![Build Status](https://secure.travis-ci.org/gpupo/adyen-sdk.png?branch=master)](http://travis-ci.org/gpupo/adyen-sdk)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gpupo/adyen-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gpupo/adyen-sdk/?branch=master)
[![Code Climate](https://codeclimate.com/github/gpupo/adyen-sdk/badges/gpa.svg)](https://codeclimate.com/github/gpupo/adyen-sdk)
[![Test Coverage](https://codeclimate.com/github/gpupo/adyen-sdk/badges/coverage.svg)](https://codeclimate.com/github/gpupo/adyen-sdk/coverage)
[![Paypal Donations](https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EK6F2WRKG7GNN&item_name=adyen-sdk)

# adyen-sdk

SDK Não Oficial para integração a partir de aplicações PHP com as APIs da Adyen

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
    'version'           => 'test',
    'public_Key'        => 'Resources/public_key.txt',
]);

```

Parâmetro | Descrição | Valores possíveis
----------|-----------|------------------
``client_user``|Usuário webservice| string
``client_password``|Senha do usuário webservice| string
``public_Key``|Path para a chave pública utilizada no CSE| string
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

Nos exemplos abaixo considere que ``$data`` possui [esta estrutura](https://github.com/gpupo/adyen-sdk/blob/master/Resources/fixtures/order.input.json);

#### Criação de uma nova transação

``` PHP
$order = $adyenSdk->createOrder($data);
$transaction = $adyenSdk->factoryManager('payment')->authorise($order);

```

---

## Propriedades dos objetos

A lista abaixo é gerada automaticamente a partir da saída da execução dos testes unitários:

<!--
phpunit --testdox | grep -vi php |  sed "s/.*\[*]/-/" | sed 's/.*Gpupo.*/&\'$'\n/g' | sed 's/.*Gpupo.*/&\'$'\n/g' | sed 's/Gpupo\\Tests\\AdyenSdk\\/### /g' | sed '/./,/^$/!d' >> README.md
-->
