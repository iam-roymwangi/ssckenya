<?php
namespace App\Enums;

enum ProductTypeEnum: string
{
    //We will have to get the list from SSC
    case NUGGETS = 'nuggets';
    case DORE_BARS = 'dore_bars';
    case REFINED_BARS = 'refined_bars';
    case DUST = 'dust';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}