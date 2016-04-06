---
layout: default
---
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

#### Captura de uma transação com cartão de crédito

``` PHP
//...
$request = $adyenSdk->createRequest($data);
$response = $manager->capture($request);

```

#### Estorno parcial em uma transação

``` PHP
//...
$request = $adyenSdk->createRequest($data);
$response = $manager->refund($request, 10.99);

```

No exemplo acima é executado o estorno de R$10.99


#### Cancelamento de uma transação

``` PHP
//...
$request = $adyenSdk->createRequest($data);
$response = $manager->cancelOrRefund($request);

```

#### Informações contidas em cada Resposta

Valores possíveis para ``$response->getResultCode()``:

Valor | Descrição
----------|-----------
Authorised|
Refused|
Error|
Cancelled|
Received|
RedirectShopper|

Valores possíveis para ``$response->getCode()``:

Valor | Descrição
----------|-----------
200|Request processed normally
400|Problem reading or understanding request
401|Authentication required
403|Insufficient permission to process request
404|Not Found
422|Request validation error
500|Server could not process request

#### Erros

Valores possíveis para ``$response->getErrorCode()``:

Valor | Descrição
----------|-----------
0	|	Unknown
10	|	Not allowed
100	|	No amount specified
101	|	Invalid card number
102	|	Unable to determine variant
103	|	CVC is not the right length
104	|	Billing address problem
105	|	Invalid paRes from issuer
106	|	This session was already used previously
107	|	Recurring is not enabled
108	|	Invalid bankaccount number
109	|	Invalid variant
110	|	BankDetails missing
111	|	Invalid BankCountryCode specified
112	|	This bank country is not supported
113	|	No InvoiceLines provided
114	|	Received an incorrect InvoiceLine
115	|	Total amount is not the same as the sum of the lines
116	|	Invalid date of birth
117	|	Invalid billing address
118	|	Invalid delivery address
119	|	Invalid shopper name
120	|	ShopperEmail is missing
121	|	ShopperReference is missing
122	|	PhoneNumber is missing
123	|	The PhoneNumber should be mobile
124	|	Invalid PhoneNumber
125	|	Invalid recurring contract specified
126	|	Bank Account or Bank Location Id not valid or missing
127	|	Account holder missing
128	|	Card Holder Missing
129	|	Expiry Date Invalid
130	|	Reference Missing
131	|	Billing address problem (City)
132	|	Billing address problem (Street)
133	|	Billing address problem (HouseNumberOrName)
134	|	Billing address problem (Country)
135	|	Billing address problem (StateOrProvince)
136	|	Failed to retrieve OpenInvoiceLines
137	|	Invalid amount specified
138	|	Unsupported currency specified
139	|	Recurring requires shopperEmail and shopperReference
140	|	Invalid expiryMonth[1..12] / expiryYear[>2000], or before now
141	|	Invalid expiryMonth[1..12] / expiryYear[>2000]
142	|	Bank Name or Bank Location not valid or missing
143	|	Submitted total iDeal merchantReturnUrl length is {0}, but max size is {1} for this request
144	|	Invalid startMonth[1..12] / startYear[>2000], or in the future
145	|	Invalid issuer countrycode
146	|	Invalid social security number
147	|	Delivery address problem (City)
148	|	Delivery address problem (Street)
149	|	Delivery address problem (HouseNumberOrName)
150	|	Delivery address problem (Country)
151	|	Delivery address problem (StateOrProvince)
152	|	Invalid number of installments
153	|	Invalid CVC
154	|	No additional data specified
155	|	No acquirer specified
156	|	No authorisation mid specified
157	|	No fields specified
158	|	Required field {0} not specified
159	|	Invalid number of requests
160	|	Not allowed to store Payout Details
161	|	Invalid iban
162	|	Inconsistent iban
163	|	Invalid bic
164	|	Auto-capture delay invalid or out of range
165	|	MandateId does not match pattern
166	|	Amount not allowed for this operation
167	|	Original pspReference required for this operation
168	|	AuthorisationCode required for this operation
170	|	Generation Date required but missing
171	|	Unable to parse Generation Date
172	|	Encrypted data used outside of valid time period
173	|	Unable to load Private Key for decryption
174	|	Unable to decrypt data
175	|	Unable to parse JSON data
180	|	Invalid shopperReference
181	|	Invalid shopperEmail
182	|	Invalid selected brand
183	|	Invalid recurring contract
184	|	Invalid recurring detail name
185	|	Invalid additionalData
186	|	Missing additionalData field
187	|	Invalid additionalData field
188	|	Invalid pspEchoData
189	|	Invalid shopperStatement
190	|	Invalid shopper IP
191	|	No params specified
192	|	Invalid field {0}
193	|	Bin Details not found for the given card number
194	|	Billing address missing
600	|	No InvoiceProject provided
601	|	No InvoiceBatch provided
602	|	No creditorAccount specified
603	|	No projectCode specified
604	|	No creditorAccount found
605	|	No project found
606	|	Unable to create InvoiceProject
607	|	InvoiceBatch already exists
608	|	Unable to create InvoiceBatch
609	|	InvoiceBatch validity period exceeded
610	|	No dunning configuration found
611	|	Invalid dunning configuration
690	|	Error while storing debtor
691	|	Error while storing invoice
692	|	Error while checking if invoice already exists for creditorAccount
693	|	Error while searching invoices
694	|	No Invoice Configuration configured for creditAccount
695	|	Invalid Invoice Configuration configured for creditAccount
700	|	No method specified
701	|	Server could not process request
702	|	Problem parsing request
800	|	Contract not found
801	|	Too many PaymentDetails defined
802	|	Invalid contract
803	|	PaymentDetail not found
804	|	Failed to disable
805	|	RecurringDetailReference not available for provided recurring-contract
806	|	No applicable contractTypes left for this payment-method
901	|	Invalid Merchant Account
902	|	Shouldn't have gotten here without a request!
903	|	Internal error
904	|	Unable To Process
905	|	Payment details are not supported
906	|	Invalid Request: Original pspReference is invalid for this environment!
907	|	US Payment details are not supported
908	|	Invalid request
950	|	Invalid AcquirerAccount
951	|	Configuration Error (acquirerIdentification)
952	|	Configuration Error (acquirerPassword)
953	|	Configuration Error (apiKey)
954	|	Configuration Error (redirectUrl)
955	|	Configuration Error (AcquirerAccountData)
956	|	Configuration Error (currencyCode)
957	|	Configuration Error (terminalId)
958	|	Configuration Error (serialNumber)
959	|	Configuration Error (password)
960	|	Configuration Error (projectId)
961	|	Configuration Error (merchantCategoryCode)
962	|	Configuration Error (merchantName)
963	|	Invalid company registration number
964	|	Invalid company name
965	|	Missing company details
966	|	Configuration Error (privateKeyAlias)
967	|	Configuration Error (publicKeyAlias)
1000	|	Card number cannot be specified for Incontrol virtual card requests
1001	|	Recurring not allowed for Incontrol virtual card requests
1002	|	Invalid Authorisation Type supplied



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

### Payment\Request\Decorator\BoletoDecorator

- To json

### Payment\Request\Decorator\CreditCardDecorator

- To json

### Payment\Request\Manager

- É o administrador de requisições
- Executa a requisição de um novo boleto e devolve objeto específico
- Executa a autorização de um pagamento com cartão de crédito e devolve objeto específico
- Em requisições mal sucedidas entrega objeto problemático
- Executa a requisição de uma captura
- Executa a requisição Refund()
- Executa a requisição CancelOrRefund()

### Payment\Request\Order\Order

- Possui método ``getId()`` para acessar Id
- Possui método ``setId()`` que define Id
- Possui método ``getShopper()`` para acessar Shopper
- Possui método ``setShopper()`` que define Shopper
- Possui método ``getAmount()`` e ``setAmount()`` para acessar e definir Amount
- Possui método ``getAmountInt()`` para acessar e definir Amount em formato "minor units"
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

### Payment\Request\Order\Shopper

- Possui método ``getFirstName()`` para acessar FirstName
- Possui método ``setFirstName()`` que define FirstName
- Possui método ``getLastName()`` para acessar LastName
- Possui método ``setLastName()`` que define LastName
- Possui método ``getIp()`` para acessar Ip
- Possui método ``setIp()`` que define Ip
- Possui método ``getEmail()`` para acessar Email
- Possui método ``setEmail()`` que define Email
- Possui método ``getSocialSecurityNumber()`` para acessar SocialSecurityNumber informado com Left Pad (zeros à esquerda)
- Possui método ``setSocialSecurityNumber()`` que define SocialSecurityNumber
- Entidade é uma Coleção

### Payment\Request\Request

- Possui método ``getOrder()`` para acessar Order
- Possui método ``setOrder()`` que define Order
- Possui método ``getType()`` para acessar Type
- Possui método ``setType()`` que define Type
- Possui método ``getEncryptedData()`` para acessar EncryptedData
- Possui método ``setEncryptedData()`` que define EncryptedData
- Entidade é uma Coleção

### Payment\Response\Decorator\BoletoDecorator

- Custom fields
- Generic fields

### Payment\Response\Decorator\CaptureDecorator

- Custom fields
- Generic fields

### Payment\Response\Decorator\CreditCardDecorator

- Custom fields
- Generic fields

### Payment\Response\Decorator\ProblematicDecorator

- Custom fields
- Generic fields

### Payment\Response\Decorator\RefundDecorator

- Custom fields
- Generic fields
