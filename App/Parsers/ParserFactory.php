<?php

declare(strict_types=1);

namespace App\Parsers;

use Doctrine\ORM\EntityManager;

enum ParserFactory: string
{
    case SANTEHORBITA = 'ParserSantehOrbita';
    case SPORTAL = 'ParserSportal';

    public function create(): ParserAbstract
    {
        return match ($this) {
            self::SANTEHORBITA => new ParserSantehOrbita(),
            self::SPORTAL => new ParserSportal(),
        };
    }
}