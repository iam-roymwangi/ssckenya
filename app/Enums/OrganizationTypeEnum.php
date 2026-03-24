<?php
namespace App\Enums;

enum OrganizationTypeEnum: string
{
    case COMPANY = 'company';
    case REFINERY = 'refinery';
    case LAB = 'lab';
    case COURIER = 'courier';

     public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}