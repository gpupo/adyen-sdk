## Árvore de dependências (libraries)
```
codeclimate/php-test-reporter 0.3.x-dev PHP client for reporting test coverage to Code Climate
|--ext-curl *
|--php >=5.3
|--satooshi/php-coveralls 1.0.*
|  |--ext-json *
|  |--ext-simplexml *
|  |--guzzle/guzzle ^2.8|^3.0
|  |  |--ext-curl *
|  |  |--php >=5.3.3
|  |  `--symfony/event-dispatcher ~2.1
|  |     `--php >=5.3.9
|  |--php >=5.3.3
|  |--psr/log ^1.0
|  |--symfony/config ^2.1|^3.0
|  |  |--php >=5.5.9
|  |  `--symfony/filesystem ~2.8|~3.0
|  |     `--php >=5.5.9
|  |--symfony/console ^2.1|^3.0
|  |  |--php >=5.5.9
|  |  `--symfony/polyfill-mbstring ~1.0
|  |     `--php >=5.3.3
|  |--symfony/stopwatch ^2.0|^3.0
|  |  `--php >=5.5.9
|  `--symfony/yaml ^2.0|^3.0
|     `--php >=5.5.9
`--symfony/console >=2.0
   |--php >=5.5.9
   `--symfony/polyfill-mbstring ~1.0
      `--php >=5.3.3
codeclimate/php-test-reporter dev-master PHP client for reporting test coverage to Code Climate
|--ext-curl *
|--php >=5.3
|--satooshi/php-coveralls 1.0.*
|  |--ext-json *
|  |--ext-simplexml *
|  |--guzzle/guzzle ^2.8|^3.0
|  |  |--ext-curl *
|  |  |--php >=5.3.3
|  |  `--symfony/event-dispatcher ~2.1
|  |     `--php >=5.3.9
|  |--php >=5.3.3
|  |--psr/log ^1.0
|  |--symfony/config ^2.1|^3.0
|  |  |--php >=5.5.9
|  |  `--symfony/filesystem ~2.8|~3.0
|  |     `--php >=5.5.9
|  |--symfony/console ^2.1|^3.0
|  |  |--php >=5.5.9
|  |  `--symfony/polyfill-mbstring ~1.0
|  |     `--php >=5.3.3
|  |--symfony/stopwatch ^2.0|^3.0
|  |  `--php >=5.5.9
|  `--symfony/yaml ^2.0|^3.0
|     `--php >=5.5.9
`--symfony/console >=2.0
   |--php >=5.5.9
   `--symfony/polyfill-mbstring ~1.0
      `--php >=5.3.3
gpupo/common-sdk 1.9.18 Componente de uso comum entre SDKs para integração a partir de aplicações PHP com Restful webservices
|--gpupo/cache ~1.2
|  |--gpupo/common *
|  |  |--doctrine/common ~2.5.1
|  |  |  |--doctrine/annotations 1.*
|  |  |  |  |--doctrine/lexer 1.*
|  |  |  |  |  `--php >=5.3.2
|  |  |  |  `--php >=5.3.2
|  |  |  |--doctrine/cache 1.*
|  |  |  |  `--php ~5.5|~7.0
|  |  |  |--doctrine/collections 1.*
|  |  |  |  `--php >=5.3.2
|  |  |  |--doctrine/inflector 1.*
|  |  |  |  `--php >=5.3.2
|  |  |  |--doctrine/lexer 1.*
|  |  |  |  `--php >=5.3.2
|  |  |  `--php >=5.3.2
|  |  `--php >=5.4
|  |--php ^5.6 || ^7.0
|  `--psr/cache 1.0.0
|     `--php >=5.3.0
|--gpupo/common ~1.5.1
|  |--doctrine/common ~2.5.1
|  |  |--doctrine/annotations 1.*
|  |  |  |--doctrine/lexer 1.*
|  |  |  |  `--php >=5.3.2
|  |  |  `--php >=5.3.2
|  |  |--doctrine/cache 1.*
|  |  |  `--php ~5.5|~7.0
|  |  |--doctrine/collections 1.*
|  |  |  `--php >=5.3.2
|  |  |--doctrine/inflector 1.*
|  |  |  `--php >=5.3.2
|  |  |--doctrine/lexer 1.*
|  |  |  `--php >=5.3.2
|  |  `--php >=5.3.2
|  `--php >=5.4
|--php >=5.4
|--psr/log ~1.0
`--twig/twig ~1.20.0
   `--php >=5.2.7
phpunit/phpunit 4.8.26 The PHP Unit Testing framework.
|--ext-dom *
|--ext-json *
|--ext-pcre *
|--ext-reflection *
|--ext-spl *
|--php >=5.3.3
|--phpspec/prophecy ^1.3.1
|  |--doctrine/instantiator ^1.0.2
|  |  `--php >=5.3,<8.0-DEV
|  |--php ^5.3|^7.0
|  |--phpdocumentor/reflection-docblock ^2.0|^3.0.2
|  |  |--php >=5.5
|  |  |--phpdocumentor/reflection-common ^1.0@dev
|  |  |  `--php >=5.5
|  |  |--phpdocumentor/type-resolver ^0.2.0
|  |  |  |--php >=5.5
|  |  |  `--phpdocumentor/reflection-common ^1.0
|  |  |     `--php >=5.5
|  |  `--webmozart/assert ^1.0
|  |     `--php >=5.3.3
|  |--sebastian/comparator ^1.1
|  |  |--php >=5.3.3
|  |  |--sebastian/diff ~1.2
|  |  |  `--php >=5.3.3
|  |  `--sebastian/exporter ~1.2
|  |     |--php >=5.3.3
|  |     `--sebastian/recursion-context ~1.0
|  |        `--php >=5.3.3
|  `--sebastian/recursion-context ^1.0
|     `--php >=5.3.3
|--phpunit/php-code-coverage ~2.1
|  |--php >=5.3.3
|  |--phpunit/php-file-iterator ~1.3
|  |  `--php >=5.3.3
|  |--phpunit/php-text-template ~1.2
|  |  `--php >=5.3.3
|  |--phpunit/php-token-stream ~1.3
|  |  |--ext-tokenizer *
|  |  `--php >=5.3.3
|  |--sebastian/environment ^1.3.2
|  |  `--php >=5.3.3
|  `--sebastian/version ~1.0
|--phpunit/php-file-iterator ~1.4
|  `--php >=5.3.3
|--phpunit/php-text-template ~1.2
|  `--php >=5.3.3
|--phpunit/php-timer ^1.0.6
|  `--php >=5.3.3
|--phpunit/phpunit-mock-objects ~2.3
|  |--doctrine/instantiator ^1.0.2
|  |  `--php >=5.3,<8.0-DEV
|  |--php >=5.3.3
|  |--phpunit/php-text-template ~1.2
|  |  `--php >=5.3.3
|  `--sebastian/exporter ~1.2
|     |--php >=5.3.3
|     `--sebastian/recursion-context ~1.0
|        `--php >=5.3.3
|--sebastian/comparator ~1.1
|  |--php >=5.3.3
|  |--sebastian/diff ~1.2
|  |  `--php >=5.3.3
|  `--sebastian/exporter ~1.2
|     |--php >=5.3.3
|     `--sebastian/recursion-context ~1.0
|        `--php >=5.3.3
|--sebastian/diff ~1.2
|  `--php >=5.3.3
|--sebastian/environment ~1.3
|  `--php >=5.3.3
|--sebastian/exporter ~1.2
|  |--php >=5.3.3
|  `--sebastian/recursion-context ~1.0
|     `--php >=5.3.3
|--sebastian/global-state ~1.0
|  `--php >=5.3.3
|--sebastian/version ~1.0
`--symfony/yaml ~2.1|~3.0
   `--php >=5.5.9
monolog/monolog 1.19.0 Sends your logs to files, sockets, inboxes, databases and various web services
|--php >=5.3.0
`--psr/log ~1.0

```
---
