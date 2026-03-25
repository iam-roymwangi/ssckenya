<?php
namespace App\Enums;
enum PaymentMethodEnum: string
{
    case BANK_TRANSFER = 'bank_transfer';
    case CRYPTO = 'crypto';
    case CASH = 'cash';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}