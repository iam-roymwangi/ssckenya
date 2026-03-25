<?php
namespace App\Enums;
enum LabTestStatusEnum: string
{
    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case VERIFIED = 'verified';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}