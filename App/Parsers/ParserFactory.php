<?php

declare(strict_types=1);

namespace App\Parsers;

use Doctrine\ORM\EntityManager;

enum ParserFactory: string
{
    case SANTEHORBITA = 'ParserSantehOrbita';
    case SPORTAL = 'ParserSportal';
    case OVKM = 'ParserOvkm';

    public function create(): ParserAbstract
    {
        return match ($this) {
            self::SANTEHORBITA => new ParserSantehOrbita(),
            self::SPORTAL => new ParserSportal(),
            self::OVKM => new ParserOvkm(),
        };
    }
}