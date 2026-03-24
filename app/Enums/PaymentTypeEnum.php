<?php
namespace App\Enums;
enum PaymentTypeEnum: string
{
    case COMMITMENT_FEE = 'commitment_fee';
    case FINAL_PAYMENT = 'final_payment';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}