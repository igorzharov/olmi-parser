<?php

declare(strict_types=1);

namespace App\Parsers;

enum ParserFactory: string
{
    case SANTEHORBITA = 'ParserSantehOrbita';
    case SPORTAL = 'ParserSportal';

    public function create(): Parser
    {
        return match ($this) {
            self::SANTEHORBITA => new ParserSantehOrbita(),
            self::SPORTAL => new ParserSportal(),
        };
    }
}