<?php
namespace App\Enums;
enum LabTestTypeEnum: string
{
    case XRF = 'xrf';
    case FIRE_ASSAY = 'fire_assay';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}