# TextoBit API SDK

## Installation

`composer require phpackage/textobit`

## Quickstart

### Send and SMS

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$token = 'ThisIsNotAValidToken';

$massMessage = \Phpackage\TextoBit\Api\MassMessage::fromToken($token);

$addr = '573216549870';
$cont = 'Lorem ipsum dolor sit amet.';

$massMessage->addRawMessage($addr, $cont);

$response = $massMessage->send();
```

## Prerequisites

* PHP >= 5.2
* The PHP JSON extension
