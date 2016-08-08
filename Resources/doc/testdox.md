
### AdyenSdk\Client\Client


- [x] Acesso ao client
- [x] Sucesso ao definir options
- [x] Gerencia uri de recurso

### AdyenSdk\Factory


- [x] Centraliza criacao de objetos

### AdyenSdk\Payment\Request\Decorator\BoletoDecorator


- [x] To json

### AdyenSdk\Payment\Request\Decorator\CreditCardDecorator


- [x] To json

### AdyenSdk\Payment\Request\Manager


- [x] É o administrador de requisições
- [x] Executa a requisição de um novo boleto e devolve objeto específico
- [x] Executa a autorização de um pagamento com cartão de crédito e devolve objeto específico
- [x] Em requisições mal sucedidas entrega objeto problemático
- [x] Executa a requisição de uma captura
- [x] Executa a requisição Refund()
- [x] Executa a requisição CancelOrRefund()

### AdyenSdk\Payment\Request\Order\Order


- [x] Possui método ``getId()`` para acessar Id
- [x] Possui método ``setId()`` que define Id
- [x] Possui método ``getShopper()`` para acessar Shopper
- [x] Possui método ``setShopper()`` que define Shopper
- [ ] Possui método ``getAmount()`` e ``setAmount()`` para acessar e definir Amount
- [ ] Possui método ``getAmountInt()`` para acessar e definir Amount em formato "minor units"
- [x] Possui método ``getBillingAddress()`` para acessar BillingAddress
- [x] Possui método ``setBillingAddress()`` que define BillingAddress
- [x] Possui método ``getShippingAddress()`` para acessar ShippingAddress
- [x] Possui método ``setShippingAddress()`` que define ShippingAddress
- [x] Possui método ``getInstallments()`` para acessar Installments
- [x] Possui método ``setInstallments()`` que define Installments
- [x] Possui método ``getDeliveryDate()`` para acessar DeliveryDate
- [x] Possui método ``setDeliveryDate()`` que define DeliveryDate
- [x] Possui método ``getCreatedAt()`` para acessar CreatedAt
- [x] Possui método ``setCreatedAt()`` que define CreatedAt
- [x] Entidade é uma Coleção

### AdyenSdk\Payment\Request\Order\Shopper


- [x] Possui método ``getFirstName()`` para acessar FirstName
- [x] Possui método ``setFirstName()`` que define FirstName
- [x] Possui método ``getLastName()`` para acessar LastName
- [x] Possui método ``setLastName()`` que define LastName
- [x] Possui método ``getIp()`` para acessar Ip
- [x] Possui método ``setIp()`` que define Ip
- [x] Possui método ``getEmail()`` para acessar Email
- [x] Possui método ``setEmail()`` que define Email
- [x] Possui método ``getSocialSecurityNumber()`` para acessar SocialSecurityNumber informado com Left Pad (zeros à esquerda)
- [x] Possui método ``setSocialSecurityNumber()`` que define SocialSecurityNumber
- [x] Entidade é uma Coleção

### AdyenSdk\Payment\Request\Request


- [x] Possui método ``getOrder()`` para acessar Order
- [x] Possui método ``setOrder()`` que define Order
- [x] Possui método ``getType()`` para acessar Type
- [x] Possui método ``setType()`` que define Type
- [x] Possui método ``getEncryptedData()`` para acessar EncryptedData
- [x] Possui método ``setEncryptedData()`` que define EncryptedData
- [x] Entidade é uma Coleção

### AdyenSdk\Payment\Response\Decorator\BoletoDecorator


- [x] Custom fields
- [x] Generic fields

### AdyenSdk\Payment\Response\Decorator\CaptureDecorator


- [x] Custom fields
- [x] Generic fields

### AdyenSdk\Payment\Response\Decorator\CreditCardDecorator


- [x] Custom fields
- [x] Generic fields

### AdyenSdk\Payment\Response\Decorator\ProblematicDecorator


- [x] Custom fields
- [x] Generic fields

### AdyenSdk\Payment\Response\Decorator\RefundDecorator


- [x] Custom fields
- [x] Generic fields

