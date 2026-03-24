<?php
namespace App\Enums;

enum ProductSpecificationLabelEnum: string
{
    //We will have to get the list from SSC
    case PREMIUM = 'premium';
    case STANDARD = 'standard';
    case ACCEPTABLE = 'acceptable';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}