<?php
namespace App\Enums;
enum PaymentStatusEnum: string
{
    use \App\Traits\EnumHelpers;

    case PENDING = 'pending';
    case CONFIRMED = 'confirmed';
    case FAILED = 'failed';

}