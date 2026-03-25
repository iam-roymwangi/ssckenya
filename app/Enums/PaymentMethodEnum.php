<?php
namespace App\Enums;
enum PaymentMethodEnum: string
{
    use \App\Traits\EnumHelpers; 

    case BANK_TRANSFER = 'bank_transfer';
    case CRYPTO = 'crypto';
    case CASH = 'cash';

}