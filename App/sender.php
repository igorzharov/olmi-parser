<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use App\Sender\ProductSender;

$parserName = 'ParserSportal';

(new ProductSender())->send($parserName);