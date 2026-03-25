<?php
namespace App\Enums;
enum DeliveryStatusEnum: string
{
    case PENDING = 'pending';
    case DISPATCHED = 'dispatched';
    case IN_TRANSIT = 'in_transit';
    case DELIVERED = 'delivered';
    case FAILED = 'failed';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}