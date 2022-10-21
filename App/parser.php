<?php

declare(strict_types=1);

use App\Parsers\ParserFactory;

require_once '../vendor/autoload.php';

$parserClassName = 'ParserSportal';

$parser = ParserFactory::from($parserClassName)->create();

//$parser->clearRelations($parserClassName);
//$parser->clearProducts($parserClassName);

$categories = $parser->getCategories();
//$relations = $parser->getRelations('relations');
//$products = $parser->getProducts();