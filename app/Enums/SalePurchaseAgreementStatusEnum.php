<?php
namespace App\Enums;

enum SalePurchaseAgreementStatusEnum: string
{
    use \App\Traits\EnumHelpers;

    case ISSUED = 'issued';
    case SIGNED = 'signed';
    case CANCELLED = 'cancelled';

}