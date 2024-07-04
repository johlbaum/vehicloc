<?php

namespace App\Enum;

enum GearBox: string
{
    case Manual = 'Manuelle';
    case Automatic = 'Automatique';

    public function getLabel(): string
    {
        return match ($this) {
            self::Manual => 'Manuelle',
            self::Automatic => 'Automatique',
        };
    }
}
