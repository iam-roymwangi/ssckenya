<?php
namespace App\Enums;
enum DeliveryStatusEnum: string
{
    use \App\Traits\EnumHelpers;

    case PENDING = 'pending';
    case DISPATCHED = 'dispatched';
    case IN_TRANSIT = 'in_transit';
    case DELIVERED = 'delivered';
    case FAILED = 'failed';
}