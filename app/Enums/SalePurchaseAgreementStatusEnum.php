<?php
namespace App\Enums;

enum SalePurchaseAgreementStatusEnum: string
{
    case ISSUED = 'issued';
    case SIGNED = 'signed';
    case CANCELLED = 'cancelled';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}