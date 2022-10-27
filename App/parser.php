<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

use App\Parsers\ParserFactory;

$parser = ParserFactory::from('ParserSportal')->create();

$categories = $parser->parserStart();