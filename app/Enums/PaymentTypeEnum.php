<?php
namespace App\Enums;
enum PaymentTypeEnum: string
{
    use \App\Traits\EnumHelpers;

    case COMMITMENT_FEE = 'commitment_fee';
    case FINAL_PAYMENT = 'final_payment';

}